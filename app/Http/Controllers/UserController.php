<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

final class UserController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $dto = $request->getDto();

        if (!Auth::attempt(['email' => $dto->email, 'password' => $dto->password])) {
            return response()->json([
                'message' => 'Unauthorized'],
                401);
        }

        /** @var User $user*/
        $user = Auth::user();

        $oldToken = DB::table('oauth_access_tokens')->where('user_id', $user->id);
        $oldToken->delete();

        $token = $user->createToken('token');
        $expiresAt = Carbon::now()->addDays(3);

        return response()->json([
            'message' => 'User login successfully',
            'data' => [
                'access_token' => $token->accessToken,
                'token_type' => 'Bearer',
                'expired_at' => $expiresAt
            ]
        ]);
    }

    public function logout(): JsonResponse
    {
        $accessToken = Auth::user()->token();

        DB::table('oauth_access_tokens')
            ->where('id', $accessToken->id)
            ->update(['revoked' => true]);

        $accessToken->revoke();

        return response()->json([
            'message' => 'User logged out successfully',
            'data' => ''
        ]);
    }
}
