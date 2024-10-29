<?php

namespace App\Http\Controllers;

use App\Models\Dream;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DreamController extends Controller
{
    // Listar todas as listas de desejos
    public function index()
    {
        return response()->json(Dream::all(), Response::HTTP_OK);
    }

    // Exibir uma lista de desejos específica
    public function show($id)
    {
        $dream = Dream::find($id);

        if (!$dream) {
            return response()->json(['error' => 'Dream not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($dream, Response::HTTP_OK);
    }

    // Criar uma nova lista de desejos
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'category_id' => 'nullable|integer|exists:categories,id',
            'price_range_min' => 'nullable|integer',
            'price_range_max' => 'nullable|integer',
        ]);

        $dream = Dream::create($request->all());

        return response()->json($dream, Response::HTTP_CREATED);
    }

    // Atualizar uma lista de desejos existente
    public function update(Request $request, $id)
    {
        $dream = Dream::find($id);

        if (!$dream) {
            return response()->json(['error' => 'Dream not found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'title' => 'string|max:255',
            'user_id' => 'integer|exists:users,id',
            'category_id' => 'nullable|integer|exists:categories,id',
            'price_range_min' => 'nullable|integer',
            'price_range_max' => 'nullable|integer',
        ]);

        $dream->update($request->all());

        return response()->json($dream, Response::HTTP_OK);
    }

    // Deletar uma lista de desejos
    public function destroy($id)
    {
        $dream = Dream::find($id);

        if (!$dream) {
            return response()->json(['error' => 'Dream not found'], Response::HTTP_NOT_FOUND);
        }

        $dream->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
