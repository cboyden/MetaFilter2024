<?php

declare(strict_types=1);

namespace App\Models;

use App\Builders\BannerLinkQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property string $url
 */
final class BannerLink extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    // Properties

    protected $fillable = [
        'title',
        'url',
    ];

    // Builders
    /*
        public function newEloquentBuilder($query): BannerLinkQueryBuilder
        {
            return new BannerLinkQueryBuilder($query);
        }*/
}
