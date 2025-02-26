<?php

declare(strict_types=1);

namespace App\Repositories;

interface FaqRepositoryInterface extends BaseRepositoryInterface
{
    public function flagged(string $flaggableType, int $flaggableId, int $userId): bool;
}
