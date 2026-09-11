<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class AdminIngredientController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::latest()->get();
        return view('admin.inventory.index', compact('ingredients'));
    }

    public function create()
    {
        return view('admin.inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit' => 'required',
            'current_stock' => 'required|numeric',
            'minimum_stock' => 'required|numeric',
        ]);

        Ingredient::create([
            'name' => $request->name,
            'unit' => $request->unit,
            'current_stock' => $request->current_stock,
            'minimum_stock' => $request->minimum_stock,
        ]);

        return redirect()
            ->route('admin.inventory.index')
            ->with('success','Ingredient added successfully.');

    }

    public function edit($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        return view('admin.inventory.edit', compact('ingredient'));
    }

    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $request->validate([
            'name'=>'required',
            'unit'=>'required',
            'current_stock'=>'required|numeric',
            'minimum_stock'=>'required|numeric',
        ]);

        $ingredient->update([
            'name'=>$request->name,
            'unit'=>$request->unit,
            'current_stock'=>$request->current_stock,
            'minimum_stock'=>$request->minimum_stock,
        ]);

        return redirect()
            ->route('admin.inventory.index')
            ->with('success','Ingredient updated successfully');
    }

    public function destroy($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()
            ->route('admin.inventory.index')
            ->with('success','Ingredient deleted successfully');
    }

    public function lowStock()
    {
        $ingredients = Ingredient::whereColumn(
            'current_stock',
            '<=',
            'minimum_stock'
        )
        ->get();

        return view(
            'admin.inventory.low-stock',
            compact('ingredients')
        );
    }
}