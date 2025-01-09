<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Enums\RouteNameEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

final class ProfileController extends BaseController
{
    public function show(User $user): View
    {
        // TODO: Add pagination for user's posts

        return view('profile.show', [
            'title' => $user->username . '&rsquo;s profile',
            'user' => $user,
        ]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(UpdateProfileRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return redirect()->route('profile.edit')->with('status', StatusEnum::ProfileUpdated);
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => [
                'required',
                'current_password',
            ],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route(RouteNameEnum::MetaFilterPostIndex)->with('status', StatusEnum::ProfileDeleted);
    }
}
