<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\CategoryRepository;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CommentRepository;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\ContactMessageRepository;
use App\Repositories\ContactMessageRepositoryInterface;
use App\Repositories\FaqRepository;
use App\Repositories\FaqRepositoryInterface;
use App\Repositories\FavoriteRepository;
use App\Repositories\FavoriteRepositoryInterface;
use App\Repositories\FlagReasonRepository;
use App\Repositories\FlagReasonRepositoryInterface;
use App\Repositories\FlagRepository;
use App\Repositories\FlagRepositoryInterface;
use App\Repositories\PageRepository;
use App\Repositories\PageRepositoryInterface;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\SubsiteRepository;
use App\Repositories\SubsiteRepositoryInterface;
use App\Repositories\TagRepository;
use App\Repositories\TagRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

final class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $repositories = [
            CategoryRepositoryInterface::class => CategoryRepository::class,
            CommentRepositoryInterface::class => CommentRepository::class,
            ContactMessageRepositoryInterface::class => ContactMessageRepository::class,
            FaqRepositoryInterface::class => FaqRepository::class,
            FavoriteRepositoryInterface::class => FavoriteRepository::class,
            FlagReasonRepositoryInterface::class => FlagReasonRepository::class,
            FlagRepositoryInterface::class => FlagRepository::class,
            PageRepositoryInterface::class => PageRepository::class,
            PostRepositoryInterface::class => PostRepository::class,
            SubsiteRepositoryInterface::class => SubsiteRepository::class,
            TagRepositoryInterface::class => TagRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
        ];

        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }
}
