<?php

declare(strict_types=1);

use App\Enums\RouteNameEnum;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Symfony\Component\HttpFoundation\Response;

test('reset password link screen can be rendered', function () {
    $response = $this->get(config('app.testUrl') . '/forgot-password');

    $response->assertStatus(Response::HTTP_OK);
});

test('reset password link can be requested', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(config('app.testUrl') . '/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(config('app.testUrl') . '/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class, function ($notification) {
        $response = $this->get(config('app.testUrl') . '/reset-password/' . $notification->token);

        $response->assertStatus(Response::HTTP_OK);

        return true;
    });
});

test('password can be reset with valid token', function () {
    Notification::fake();

    $user = User::factory()->create();

    $this->post(config('app.testUrl') . '/forgot-password', ['email' => $user->email]);

    Notification::assertSentTo($user, ResetPassword::class, function ($notification) use ($user) {
        $response = $this->post(RouteNameEnum::AuthResetPassword, [
            'token' => $notification->token,
            'email' => $user->email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route(RouteNameEnum::AuthLoginCreate));

        return true;
    });
});
