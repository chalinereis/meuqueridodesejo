<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dream;
use App\Models\Wish;

class DreamWishController extends Controller
{
    // Listar todos os desejos associados a um sonho específico
    public function index($dreamId)
    {
        $dream = Dream::with('wishes')->find($dreamId);

        if (!$dream) {
            return response()->json(['message' => 'Dream not found'], 404);
        }

        return response()->json($dream->wishes);
    }

    // Mostrar um desejo específico associado a um sonho, com prioridade
    public function show($dreamId, $wishId)
    {
        $wish = Dream::find($dreamId)
            ->wishes()
            ->where('wish_id', $wishId)
            ->first();

        if (!$wish) {
            return response()->json(['message' => 'Wish not found in this dream'], 404);
        }

        return response()->json($wish);
    }

    // Adicionar um desejo a um sonho com prioridade
    public function store(Request $request, $dreamId)
    {
        $request->validate([
            'wish_id' => 'required|exists:wishes,id',
            'priority' => 'required|in:High,Medium,Low',
        ]);

        $dream = Dream::find($dreamId);

        if (!$dream) {
            return response()->json(['message' => 'Dream not found'], 404);
        }

        $dream->wishes()->attach($request->wish_id, ['priority' => $request->priority]);

        return response()->json(['message' => 'Wish added to dream successfully'], 201);
    }

    // Atualizar a prioridade de um desejo em um sonho
    public function update(Request $request, $dreamId, $wishId)
    {
        $request->validate([
            'priority' => 'required|in:High,Medium,Low',
        ]);

        $dream = Dream::find($dreamId);

        if (!$dream) {
            return response()->json(['message' => 'Dream not found'], 404);
        }

        $wish = $dream->wishes()->where('wish_id', $wishId)->first();

        if (!$wish) {
            return response()->json(['message' => 'Wish not found in this dream'], 404);
        }

        $dream->wishes()->updateExistingPivot($wishId, ['priority' => $request->priority]);

        return response()->json(['message' => 'Priority updated successfully'], 200);
    }

    // Remover um desejo de um sonho
    public function destroy($dreamId, $wishId)
    {
        $dream = Dream::find($dreamId);

        if (!$dream) {
            return response()->json(['message' => 'Dream not found'], 404);
        }

        $dream->wishes()->detach($wishId);

        return response()->json(['message' => 'Wish removed from dream successfully'], 200);
    }
}
