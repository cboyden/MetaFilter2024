<?php

declare(strict_types=1);

namespace App\Enums;

enum StatusEnum: string
{
    case FAILURE = 'failure';
    case SUCCESS = 'success';
    case PASSWORD_UPDATED = 'password-updated';
    case PROFILE_UPDATED = 'profile-updated';
    case VERIFICATION_LINK_SENT = 'verification-link-sent';
    case POST_ADDED = 'Post added';
    case POST_ADDING_FAILED = 'Adding post failed';
}
