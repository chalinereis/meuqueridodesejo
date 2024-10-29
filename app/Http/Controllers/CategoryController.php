<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Lista todas as categorias
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    // Exibe uma categoria específica
    public function show($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        return response()->json($category);
    }

    // Cria uma nova categoria
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create($validatedData);

        return response()->json(['message' => 'Categoria criada com sucesso', 'data' => $category], 201);
    }

    // Atualiza uma categoria existente
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($validatedData);

        return response()->json(['message' => 'Categoria atualizada com sucesso', 'data' => $category]);
    }

    // Exclui uma categoria
    public function destroy($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Categoria não encontrada'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Categoria excluída com sucesso']);
    }
}
