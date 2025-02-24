<?php

declare(strict_types=1);

namespace App\Traits;

use App\Enums\RouteNameEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

trait UserTrait
{
    public function getProfileUrl(Model|User $user): string
    {
        return route(RouteNameEnum::MemberShow->value, [
            'user' => $user,
        ]);
    }

    public function getUserById(int $userId): User
    {
        return User::findOrFail($userId);
    }
}
