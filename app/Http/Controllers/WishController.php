<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WishController extends Controller
{
    // Listar todos os itens desejados
    public function index()
    {
        $wishes = Wish::all();
        return response()->json($wishes, Response::HTTP_OK);
    }

    // Exibir um item desejado específico
    public function show($id)
    {
        $wish = Wish::find($id);

        if (!$wish) {
            return response()->json(['error' => 'Wish not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($wish, Response::HTTP_OK);
    }

    // Criar um novo item desejado
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        $wish = Wish::create($request->all());

        return response()->json($wish, Response::HTTP_CREATED);
    }

    // Atualizar um item desejado existente
    public function update(Request $request, $id)
    {
        $wish = Wish::find($id);

        if (!$wish) {
            return response()->json(['error' => 'Wish not found'], Response::HTTP_NOT_FOUND);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|integer',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        $wish->update($request->all());

        return response()->json($wish, Response::HTTP_OK);
    }

    // Deletar um item desejado
    public function destroy($id)
    {
        $wish = Wish::find($id);

        if (!$wish) {
            return response()->json(['error' => 'Wish not found'], Response::HTTP_NOT_FOUND);
        }

        $wish->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
