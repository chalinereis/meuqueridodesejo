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


// Rotas para `users`
    // GET /users - Lista todos os usuários
    // GET /users/{id} - Exibe um usuário específico
    // POST /users - Cria um novo usuário
    // PUT /users/{id} - Atualiza um usuário específico
    // DELETE /users/{id} - Remove um usuário específico

// Rotas para `dreams`
    // GET /dreams - Lista todos os sonhos
    // GET /dreams/{id} - Exibe um sonho específico
    // POST /dreams - Cria um novo sonho
    // PUT /dreams/{id} - Atualiza um sonho específico
    // DELETE /dreams/{id} - Remove um sonho específico

// Rotas para `wishes`
    // GET /wishes - Lista todos os desejos
    // GET /wishes/{id} - Exibe um desejo específico
    // POST /wishes - Cria um novo desejo
    // PUT /wishes/{id} - Atualiza um desejo específico
    // DELETE /wishes/{id} - Remove um desejo específico

// Rotas para `categories`
    // GET /categories - Lista todas as categorias
    // GET /categories/{id} - Exibe uma categoria específica
    // POST /categories - Cria uma nova categoria
    // PUT /categories/{id} - Atualiza uma categoria específica
    // DELETE /categories/{id} - Remove uma categoria específica

// Rotas para `wish_suggestions`
    // GET /wish-suggestions - Lista todas as sugestões de desejos
    // GET /wish-suggestions/{id} - Exibe uma sugestão específica
    // POST /wish-suggestions - Cria uma nova sugestão de desejo
    // PUT /wish-suggestions/{id} - Atualiza uma sugestão de desejo específica
    // DELETE /wish-suggestions/{id} - Remove uma sugestão de desejo específica

// Rotas para `invitations`
    // GET /invitations - Lista todos os convites
    // GET /invitations/{id} - Exibe um convite específico
    // POST /invitations - Cria um novo convite
    // PUT /invitations/{id} - Atualiza um convite específico
    // DELETE /invitations/{id} - Remove um convite específico

// Rotas para `cart_items`
    // GET /cart-items - Lista todos os itens no carrinho
    // GET /cart-items/{id} - Exibe um item específico do carrinho
    // POST /cart-items - Adiciona um novo item ao carrinho
    // PUT /cart-items/{id} - Atualiza um item específico do carrinho
    // DELETE /cart-items/{id} - Remove um item específico do carrinho

// Rotas para `dream_wishes`
    // GET /dream-wishes - Lista todas as associações de sonhos e desejos
    // GET /dream-wishes/{dream_id}/{wish_id} - Exibe uma associação específica
    // POST /dream-wishes - Cria uma nova associação de sonho e desejo
    // PUT /dream-wishes/{dream_id}/{wish_id} - Atualiza uma associação específica
    // DELETE /dream-wishes/{dream_id}/{wish_id} - Remove uma associação específica

