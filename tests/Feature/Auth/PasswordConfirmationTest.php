<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

test('confirm password screen can be rendered', function () {
    $this->markTestSkipped();
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->actingAs($user)->get(config('app.testUrl') . '/confirm-password');

    // Assert
    $response->assertStatus(Response::HTTP_OK);
});

test('password can be confirmed', function () {
    $this->markTestSkipped();
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->actingAs($user)->post(config('app.testUrl') . '/confirm-password', [
        'password' => 'password',
    ]);

    // Assert
    $response->assertRedirect();

    try {
        $response->assertSessionHasNoErrors();
    } catch (JsonException $exception) {
        Log::error($exception->getMessage());
    }
});

test('password is not confirmed with invalid password', function () {
    $this->markTestSkipped();
    // Arrange
    $user = User::factory()->create();

    // Act
    $response = $this->actingAs($user)->post(config('app.testUrl') . '/confirm-password', [
        'password' => 'wrong-password',
    ]);

    // Assert
    $response->assertSessionHasErrors();
});
