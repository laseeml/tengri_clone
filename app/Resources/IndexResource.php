<?php

namespace App\Resources;

use App\Models\News;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * @mixin News
 */
final class IndexResource extends JsonResource
{
    public function toArray($request): array
    {
        return [

        ];
    }
}
