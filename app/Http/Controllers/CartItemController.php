<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use Illuminate\Http\Request;

class CartItemController extends Controller
{
    // Lista todos os itens do carrinho
    public function index()
    {
        $cartItems = CartItem::all();
        return response()->json($cartItems);
    }

    // Exibe um item específico do carrinho
    public function show($id)
    {
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }
        return response()->json($cartItem);
    }

    // Adiciona um novo item ao carrinho
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'wish_id' => 'required|integer|exists:wishes,id',
            'invitation_id' => 'required|integer|exists:invitations,id',
            'price_at_addition' => 'required|integer',
            'added_by_user_id' => 'required|integer|exists:users,id'
        ]);

        $cartItem = CartItem::create($validatedData);
        return response()->json($cartItem, 201);
    }

    // Atualiza um item específico do carrinho
    public function update(Request $request, $id)
    {
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'wish_id' => 'integer|exists:wishes,id',
            'invitation_id' => 'integer|exists:invitations,id',
            'price_at_addition' => 'integer',
            'added_by_user_id' => 'integer|exists:users,id'
        ]);

        $cartItem->update($validatedData);
        return response()->json($cartItem);
    }

    // Remove um item do carrinho
    public function destroy($id)
    {
        $cartItem = CartItem::find($id);
        if (!$cartItem) {
            return response()->json(['message' => 'Item não encontrado'], 404);
        }

        $cartItem->delete();
        return response()->json(['message' => 'Item removido com sucesso']);
    }
}
