
<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('user can view login page', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('user can register a new account', function () {
    $response = $this->post('/register', [
        'name' => 'William',
        'email' => 'william@example.com',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect('/login');

    $this->assertDatabaseHas('users', [
        'email' => 'william@example.com',
    ]);

    $user = User::where('email', 'william@example.com')->first();

    expect(Hash::check('password123', $user->password))->toBeTrue();
});

test('user can login with correct credentials', function () {
    $user = User::factory()->create([
        'password' => 'password123',
    ]);

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password123',
    ]);

    $response->assertRedirect('/product');

    $this->assertAuthenticatedAs($user);
});

test('user cannot login with incorrect password', function () {
    $user = User::factory()->create();

    $response = $this->post('/login', [
        'email' => $user->email,
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHas(
        'error',
        'Email atau Password Anda Salah!'
    );

    $this->assertGuest();
});

test('authenticated user can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $response->assertRedirect('/login');

    $this->assertGuest();
});

test('guest cannot access product page', function () {
    $response = $this->get('/product');

    $response->assertRedirect('/login');
});
