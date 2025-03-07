<?php

declare(strict_types=1);

namespace App\View\Components\Members;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class ProfileLinkComponent extends Component
{
    public string $filename = 'person';
    public bool $showIcon = true;
    public string $titleText = '';
    public string $username = '';
    public int $userId = 0;
    public User $user;

    public function __construct(User $user, bool $showIcon = true)
    {
        $this->user = $user;
        $this->showIcon = $showIcon;
        $this->filename = $this->getFilename();
        $this->titleText = $this->getTitleText();
    }

    public function render(): View
    {
        return view('components.members.profile-link-component', [
            'username' => $this->username,
            'filename' => $this->filename,
            'showIcon' => $this->showIcon,
        ]);
    }

    private function getFilename(): string
    {
        $filename = 'person';

        if (auth()->guest()) {
            return $filename;
        }

        if (isset($this->user->username) && $this->user->username === auth()->user()->username) {
            $filename = 'person-fill';
        }

        return $filename;
    }

    private function getTitleText(): string
    {
        $text = 'View profile';

        if (auth()->guest()) {
            return $text;
        }

        if (isset($this->user->username)) {
            $text = 'View ' . $this->user->username . "'s profile";
        }

        return $text;
    }
}
