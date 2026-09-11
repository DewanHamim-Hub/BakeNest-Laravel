<?php

namespace App\Http\Controllers;

use App\Models\Production;
use App\Models\ProductVariant;
use App\Models\InventoryTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AdminProductionController extends Controller
{


    public function index()
    {

        $productions = Production::with(
            'productVariant.product'
        )
        ->latest()
        ->get();


        return view(
            'admin.productions.index',
            compact('productions')
        );

    }

    public function create()
    {

        $productVariants = ProductVariant::with('product')
                            ->get();


        return view(
            'admin.productions.create',
            compact('productVariants')
        );

    }

    public function store(Request $request)
    {

        $request->validate([

            'product_variant_id'=>'required',

            'quantity'=>'required|integer|min:1',

            'production_date'=>'required|date',

        ]);

        DB::transaction(function() use ($request){

            $variant = ProductVariant::with(
                'product',
                'recipe.recipeIngredients.ingredient'
            )
            ->findOrFail(
                $request->product_variant_id
            );

            /*
            |--------------------------------------------------------------------------
            | Create Production Record
            |--------------------------------------------------------------------------
            */


            $production = Production::create([

                'product_variant_id'=>$variant->id,

                'quantity'=>$request->quantity,

                'production_date'=>$request->production_date,

                'notes'=>$request->notes,

            ]);

           /*
            |--------------------------------------------------------------------------
            | Increase Product Stock
            |--------------------------------------------------------------------------
            */

            $variant->increment(

                'stock_quantity',

                $request->quantity

            );

            InventoryTransaction::create([

                'product_variant_id'=>$variant->id,

                'type'=>'Production',

                'quantity'=>$request->quantity,

                'reference_type'=>'Production',

                'reference_id'=>$production->id,

                'notes'=>'Produced '.$variant->product->name,

            ]);

            /*
            |--------------------------------------------------------------------------
            | Consume Ingredients
            |--------------------------------------------------------------------------
            */

            $recipe = $variant->recipe;
            if($recipe)
            {
                foreach($recipe->recipeIngredients as $item)
                {

                    $usedQuantity =
                        $item->quantity_required
                        *
                        $request->quantity;

                    $ingredient = $item->ingredient;

                    $ingredient->decrement(
                        'current_stock',
                        $usedQuantity
                    );

                    InventoryTransaction::create([
                        'ingredient_id'=>$ingredient->id,
                        'type'=>'Stock Consumed',
                        'quantity'=>$usedQuantity,
                        'reference_type'=>'Production',
                        'reference_id'=>$production->id,
                        'notes'=>
                        'Used for '.$variant->product->name,
                    ]);
                }
            }
        });

        return redirect()

            ->route('admin.productions.index')

            ->with(
                'success',
                'Production completed successfully'
            );
    }
}