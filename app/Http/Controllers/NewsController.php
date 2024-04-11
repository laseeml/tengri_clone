<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Requests\CreateRequest;
use App\Requests\FindRequest;
use App\Requests\IndexRequest;
use App\Requests\UpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

final class NewsController extends Controller
{
    public function index(IndexRequest $request): JsonResponse
    {
        $filter = $request->getFilter();

        $news = News::query()
            ->with('category')
            ->orderBy('updated_at', 'desc')
            ->when($filter, fn($query) => $query->where('category_id', $filter))
            ->paginate('10');

        return response()->json([
            'message' => 'All news retrieved successfully',
            'data' => $news
        ]);
    }

    public function show(News $news): JsonResponse
    {
        $news = $news->load('category');

        return response()->json([
            'message' => 'News retrieved successfully',
            'data' => $news
        ]);
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $dto = $request->getDto();

        DB::transaction(function () use ($dto) {
            $news = new News();

            $news->title = $dto->title;
            $news->description = $dto->description;
            $news->description_title = $dto->description_title;
            $news->category_id = $dto->categoryId;

            $path = $dto->image->store('images', 'public');
            $news->image = $path;

            $news->save();
        });

        return response()->json([
            'message' => 'News created successfully',
            'data' => ''
        ]);
    }

    public function update(News $news, UpdateRequest $request): JsonResponse
    {
        $dto = $request->getDto();

        DB::transaction(function () use ($dto, $news) {
            if ($dto->title) $news->title = $dto->title;
            if ($dto->description) $news->description = $dto->description;
            if ($dto->description_title) $news->description_title = $dto->description_title;
            if ($dto->image) {
                $path = $dto->image->store('images', 'public');
                $news->image = $path;
            }
            if ($dto->categoryId) $news->category_id = $dto->categoryId;
            $news->updated_at = Carbon::now();

            $news->save();
        });

        return response()->json([
            'message' => 'News updated successfully',
            'data' => $news
        ]);
    }

    public function delete(News $news): JsonResponse
    {
        $news->delete();

        return response()->json([
            'message' => 'News deleted successfully',
            'data' => ''
        ]);
    }

    public function find(FindRequest $request): JsonResponse
    {
        $findBy = $request->getFindBy();

        $news = News::query()
            ->with('category')
            ->where('title', 'like', sprintf('%%%s%%', $findBy))
            ->orderBy('updated_at', 'desc')
            ->get();

        return response()->json([
            'message' => 'News found successfully',
            'data' => $news
        ]);
    }
}
