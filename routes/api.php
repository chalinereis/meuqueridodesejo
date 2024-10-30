<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController, // Adicione o controlador de autenticação
    UserController,
    DreamController,
    WishController,
    CategoryController,
    WishSuggestionController,
    InvitationController,
    CartItemController,
    DreamWishController
};

// Rotas de Autenticação
Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', 'logout');
        Route::get('/user', 'user');
    });
});

// Rotas protegidas para `users`
Route::prefix('users')->middleware('auth:sanctum')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `dreams`
Route::prefix('dreams')->middleware('auth:sanctum')->controller(DreamController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `wishes`
Route::prefix('wishes')->middleware('auth:sanctum')->controller(WishController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `categories`
Route::prefix('categories')->middleware('auth:sanctum')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `wish_suggestions`
Route::prefix('wish-suggestions')->middleware('auth:sanctum')->controller(WishSuggestionController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `invitations`
Route::prefix('invitations')->middleware('auth:sanctum')->controller(InvitationController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `cart_items`
Route::prefix('cart-items')->middleware('auth:sanctum')->controller(CartItemController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `dream_wishes`
Route::prefix('dream-wishes')->middleware('auth:sanctum')->controller(DreamWishController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{dream_id}/{wish_id}', 'show');
    Route::post('/', 'store');
    Route::put('/{dream_id}/{wish_id}', 'update');
    Route::delete('/{dream_id}/{wish_id}', 'destroy');
});
