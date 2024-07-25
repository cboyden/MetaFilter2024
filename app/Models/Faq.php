<?php

declare(strict_types=1);

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $question
 * @property string $slug
 * @property string $answer
 * @property int $subsite_id
 */
final class Faq extends BaseModel
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'question',
        'answer',
        'subsite_id',
    ];

    public function sluggable(): array
    {
        return $this->getSlugFrom('question');
    }
}
