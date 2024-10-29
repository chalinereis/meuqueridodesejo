<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DreamController;
use App\Http\Controllers\WishController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishSuggestionController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\DreamWishController;

//Adicionar exempos depois aqui pra lembrar como usar cada rota

// Rotas para a entidade `users`
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

// Rotas para a entidade `dreams`
Route::get('/dreams', [DreamController::class, 'index']);
Route::get('/dreams/{id}', [DreamController::class, 'show']);
Route::post('/dreams', [DreamController::class, 'store']);
Route::put('/dreams/{id}', [DreamController::class, 'update']);
Route::delete('/dreams/{id}', [DreamController::class, 'destroy']);

// Rotas para a entidade `wishes`
Route::get('/wishes', [WishController::class, 'index']);
Route::get('/wishes/{id}', [WishController::class, 'show']);
Route::post('/wishes', [WishController::class, 'store']);
Route::put('/wishes/{id}', [WishController::class, 'update']);
Route::delete('/wishes/{id}', [WishController::class, 'destroy']);

// Rotas para a entidade `categories`
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{id}', [CategoryController::class, 'show']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::put('/categories/{id}', [CategoryController::class, 'update']);
Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

// Rotas para a entidade `wish_suggestions`
Route::get('/wish-suggestions', [WishSuggestionController::class, 'index']);
Route::get('/wish-suggestions/{id}', [WishSuggestionController::class, 'show']);
Route::post('/wish-suggestions', [WishSuggestionController::class, 'store']);
Route::put('/wish-suggestions/{id}', [WishSuggestionController::class, 'update']);
Route::delete('/wish-suggestions/{id}', [WishSuggestionController::class, 'destroy']);

// Rotas para a entidade `invitations`
Route::get('/invitations', [InvitationController::class, 'index']);
Route::get('/invitations/{id}', [InvitationController::class, 'show']);
Route::post('/invitations', [InvitationController::class, 'store']);
Route::put('/invitations/{id}', [InvitationController::class, 'update']);
Route::delete('/invitations/{id}', [InvitationController::class, 'destroy']);

// Rotas para a entidade `cart_items`
Route::get('/cart-items', [CartItemController::class, 'index']);
Route::get('/cart-items/{id}', [CartItemController::class, 'show']);
Route::post('/cart-items', [CartItemController::class, 'store']);
Route::put('/cart-items/{id}', [CartItemController::class, 'update']);
Route::delete('/cart-items/{id}', [CartItemController::class, 'destroy']);

// Rotas para a entidade `dream_wishes`
Route::get('/dream-wishes', [DreamWishController::class, 'index']);
Route::get('/dream-wishes/{dream_id}/{wish_id}', [DreamWishController::class, 'show']);
Route::post('/dream-wishes', [DreamWishController::class, 'store']);
Route::put('/dream-wishes/{dream_id}/{wish_id}', [DreamWishController::class, 'update']);
Route::delete('/dream-wishes/{dream_id}/{wish_id}', [DreamWishController::class, 'destroy']);
