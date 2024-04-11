<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $description_title
 * @property string $image
 * @property int $category_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
final class News extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'news';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'description_title',
        'image',
        'category_id',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
