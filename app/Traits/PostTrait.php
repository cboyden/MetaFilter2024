<?php

declare(strict_types=1);

namespace App\Traits;

use App\Models\Post;
use Carbon\Carbon;

trait PostTrait
{
    use SubsiteTrait;
    use UrlTrait;

    public function isArchived(Post $post, int $days = 30): bool
    {
        $archiveDate = now()->subDays($days);

        $postDate = $post->created_at;

        return $postDate <= $archiveDate;
    }

    public function getCanonicalUrl(Post $post): string
    {
        $subdomain = $this->getSubdomainFromUrl();

        if ($subdomain = 'www') {
            $subdomain = 'metafilter';
        }

        return route("$subdomain.post.show", [
            'post' => $post,
            'slug' => $post->slug,
        ]);
    }

    public function getTimestamp(Post $post): array
    {
        return [
            'icon' => $post->created_at->gt(Carbon::now()->subDay()) ? 'icon-clock' : 'icon-calendar',
            'datetime' => $post->created_at->format('Y-m-d H:i:d'),
            'diffForHumans' => $post->created_at->diffForHumans(),
        ];
    }

    public function getNewPostText(): string
    {
        return 'New Post';
    }
}
