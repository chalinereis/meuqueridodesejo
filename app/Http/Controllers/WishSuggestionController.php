<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishSuggestion;
use Illuminate\Http\Response;

class WishSuggestionController extends Controller
{
    // Lista todas as sugestões de desejos
    public function index()
    {
        $suggestions = WishSuggestion::all();
        return response()->json($suggestions, Response::HTTP_OK);
    }

    // Exibe uma sugestão de desejo específica
    public function show($id)
    {
        $suggestion = WishSuggestion::find($id);

        if (!$suggestion) {
            return response()->json(['message' => 'Sugestão não encontrada'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($suggestion, Response::HTTP_OK);
    }

    // Armazena uma nova sugestão de desejo
    public function store(Request $request)
    {
        $request->validate([
            'wish_id' => 'required|exists:wishes,id',
            'suggested_product_name' => 'required|string',
            'suggested_price' => 'required|integer',
            'suggested_store' => 'required|string',
        ]);

        $suggestion = WishSuggestion::create($request->all());
        
        return response()->json($suggestion, Response::HTTP_CREATED);
    }

    // Atualiza uma sugestão de desejo existente
    public function update(Request $request, $id)
    {
        $suggestion = WishSuggestion::find($id);

        if (!$suggestion) {
            return response()->json(['message' => 'Sugestão não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'wish_id' => 'sometimes|exists:wishes,id',
            'suggested_product_name' => 'sometimes|string',
            'suggested_price' => 'sometimes|integer',
            'suggested_store' => 'sometimes|string',
        ]);

        $suggestion->update($request->all());

        return response()->json($suggestion, Response::HTTP_OK);
    }

    // Remove uma sugestão de desejo
    public function destroy($id)
    {
        $suggestion = WishSuggestion::find($id);

        if (!$suggestion) {
            return response()->json(['message' => 'Sugestão não encontrada'], Response::HTTP_NOT_FOUND);
        }

        $suggestion->delete();

        return response()->json(['message' => 'Sugestão removida com sucesso'], Response::HTTP_OK);
    }
}
