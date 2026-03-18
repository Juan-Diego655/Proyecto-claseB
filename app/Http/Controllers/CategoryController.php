<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categoryList = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index', [
            'categoryList' => $categoryList
        ]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|min:3|max:100',
            'descripcion' => 'required|min:5'
        ]);

        $newCategory = new Category();
        $newCategory->name = $request->get('nombre');
        $newCategory->description = $request->get('descripcion');
        $newCategory->save();

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        if ($category->products()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'No se puede eliminar una categoría con productos asociados.');
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}