<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\FavoriteRepositoryInterface;
use App\Traits\LoggingTrait;
use Exception;

final class FavoritePostService
{
    use LoggingTrait;

    private const string FAVORITABLE_TYPE = 'App\Models\Post';

    public function __construct(
        protected FavoriteRepositoryInterface $favoriteRepository,
    ) {}

    public function favorited(int $postId, ?int $userId): bool
    {
        if ($userId === null) {
            return false;
        }

        return $this->favoriteRepository->favorited(self::FAVORITABLE_TYPE, $postId, $userId);
    }

    public function create(int $postId, int $userId): bool
    {
        $data = [
            'favoritable_type' => self::FAVORITABLE_TYPE,
            'favoritable_id' => $postId,
            'user_id' => $userId,
        ];

        try {
            $this->favoriteRepository->create($data);

            return true;
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }

    public function delete(int $commentId, int $userId): bool
    {
        $data = [
            'favoritable_type' => self::FAVORITABLE_TYPE,
            'favoritable_id' => $commentId,
            'user_id' => $userId,
        ];

        try {
            $this->favoriteRepository->deleteFavorite($data);

            return true;
        } catch (Exception $exception) {
            $this->logError($exception);

            return false;
        }
    }
}
