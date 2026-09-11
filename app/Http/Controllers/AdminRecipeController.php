<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\ProductVariant;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use Illuminate\Http\Request;

class AdminRecipeController extends Controller
{

    public function index()
    {
        $recipes = Recipe::with([
            'productVariant.product',
            'recipeIngredients.ingredient'
        ])->get();


        return view('admin.recipes.index', compact('recipes'));
    }

    public function create()
    {
        $productVariants = ProductVariant::with('product')->get();

        $ingredients = Ingredient::all();


        return view('admin.recipes.create', compact(
            'productVariants',
            'ingredients'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_variant_id'=>'required',
            'name'=>'required',
            'ingredients'=>'required|array',
            'ingredients.*.id'=>'required',
            'ingredients.*.quantity'=>'required|numeric|min:0.01',
        ]);

        $recipe = Recipe::create([
            'product_variant_id'=>$request->product_variant_id,
            'name'=>$request->name,
        ]);

        foreach($request->ingredients as $ingredient)
        {
            RecipeIngredient::create([

                'recipe_id'=>$recipe->id,

                'ingredient_id'=>$ingredient['id'],

                'quantity_required'=>$ingredient['quantity'],

            ]);

        }

        return redirect()
                ->route('admin.recipes.index')
                ->with('success','Recipe created successfully');

    }

    public function show(Recipe $recipe)
    {

        $recipe->load([
            'productVariant.product',
            'recipeIngredients.ingredient'
        ]);


        return view('admin.recipes.show',compact('recipe'));

    }

    public function edit(Recipe $recipe)
    {
        $recipe->load('recipeIngredients');

        $productVariants = ProductVariant::with('product')->get();

        $ingredients = Ingredient::all();
        
        return view('admin.recipes.edit',compact(
            'recipe',
            'productVariants',
            'ingredients'
        ));

    }

    public function update(Request $request, Recipe $recipe)
    {
        $request->validate([
            'product_variant_id'=>'required',
            'name'=>'required',
            'ingredients'=>'required|array',
            'ingredients.*.id'=>'required',
            'ingredients.*.quantity'=>'required|numeric|min:0.01',
        ]);

        $recipe->update([
            'product_variant_id'=>$request->product_variant_id,
            'name'=>$request->name,
        ]);

        // remove old ingredients

        RecipeIngredient::where('recipe_id',$recipe->id)
                        ->delete();

        foreach($request->ingredients as $ingredient)
        {

            RecipeIngredient::create([

                'recipe_id'=>$recipe->id,

                'ingredient_id'=>$ingredient['id'],

                'quantity_required'=>$ingredient['quantity'],

            ]);
        }

        return redirect()
                ->route('admin.recipes.index')
                ->with('success','Recipe updated successfully');

    }

    public function destroy(Recipe $recipe)
    {

        $recipe->delete();

        return redirect()
                ->route('admin.recipes.index')
                ->with('success','Recipe deleted successfully');

    }
}