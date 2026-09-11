<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Production;
use App\Models\InventoryTransaction;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeIngredient;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Demo Users
        |--------------------------------------------------------------------------
        */

        User::create([
            'name' => 'BakeNest Admin',
            'email' => 'admin@bakenest.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_restricted' => false,
        ]);


        User::create([
            'name' => 'Customer One',
            'email' => 'customer1@bakenest.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'is_restricted' => false,
        ]);

        User::create([
            'name' => 'Customer Two',
            'email' => 'customer2@bakenest.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'is_restricted' => false,
        ]);

        User::create([
            'name' => 'Restricted Customer',
            'email' => 'customer3@bakenest.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
            'is_restricted' => true,
        ]);



        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        $cakes = Category::create([
            'name' => 'Cakes',
            'description' => 'Fresh handmade cakes'
        ]);

        $bread = Category::create([
            'name' => 'Breads',
            'description' => 'Fresh bakery breads'
        ]);

        $cookies = Category::create([
            'name' => 'Cookies',
            'description' => 'Crunchy bakery cookies'
        ]);

        $pastries = Category::create([
            'name' => 'Pastries',
            'description' => 'Sweet and creamy pastries'
        ]);

        $desserts = Category::create([
            'name' => 'Desserts',
            'description' => 'Special desserts'
        ]);



        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        $chocolateCake = Product::create([
            'category_id' => $cakes->id,
            'name' => 'Chocolate Truffle Cake',
            'description' => 'Rich chocolate cake with cream',
            'image' => 'products/cakes/chocolate-truffle.jpg',
        ]);


        $redVelvet = Product::create([
            'category_id' => $cakes->id,
            'name' => 'Red Velvet Cake',
            'description' => 'Classic red velvet cake',
            'image' => 'products/cakes/red-velvet.jpg',
        ]);

        $cheeseCake = Product::create([
            'category_id' => $cakes->id,
            'name' => 'Cheese Cake',
            'description' => 'Fluffy and soft chessecake',
            'image' => 'products/cakes/cheesecake.jpg',
        ]);


        $brownBread = Product::create([
            'category_id' => $bread->id,
            'name' => 'Brown Bread',
            'description' => 'Healthy fresh bread',
            'image' => 'products/breads/brown-bread.jpg',
        ]);

        $garlicBread = Product::create([
            'category_id' => $bread->id,
            'name' => 'Garlic Bread',
            'description' => 'Salty and tasty garlic bread',
            'image' => 'products/breads/garlic-bread.jpg',
        ]);


        $butterCookie = Product::create([
            'category_id' => $cookies->id,
            'name' => 'Butter Cookies',
            'description' => 'Homemade butter cookies',
            'image' => 'products/cookies/butter-cookie.jpg',
        ]);

        $oreoCookie = Product::create([
            'category_id' => $cookies->id,
            'name' => 'Oreo Cookies',
            'description' => 'Trendy oreo cookies',
            'image' => 'products/cookies/oreo-cookie.jpg',
        ]);


        $creamPastry = Product::create([
            'category_id' => $pastries->id,
            'name' => 'Cream Pastry',
            'description' => 'Soft cream pastry',
            'image' => 'products/pastries/cream-pastry.jpg',
        ]);

        $brownie = Product::create([
            'category_id' => $desserts->id,
            'name' => 'Chocolate Brownie',
            'description' => 'Fudgy, chocolatey brownie',
            'image' => 'products/desserts/brownie.jpg',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Product Variants
        |--------------------------------------------------------------------------
        */

        $chocolateCake_halflb = ProductVariant::create([
            'product_id'=>$chocolateCake->id,
            'size_or_weight'=>'0.5 lb',
            'price'=>500,        
            'stock_quantity'=>15       
        ]);

        $chocolateCake1lb = ProductVariant::create([
            'product_id'=>$chocolateCake->id,        
            'size_or_weight'=>'1 lb',        
            'price'=>900,        
            'stock_quantity'=>25        
        ]);
        
        $redVelevt_halflb = ProductVariant::create([
            'product_id'=>$redVelvet->id,        
            'size_or_weight'=>'0.5 lb',        
            'price'=>550,        
            'stock_quantity'=>10      
        ]);

        $redVelevt1lb = ProductVariant::create([
            'product_id'=>$redVelvet->id,        
            'size_or_weight'=>'1 lb',        
            'price'=>950,        
            'stock_quantity'=>5      
        ]);

        $cheeseCake1lb = ProductVariant::create([
            'product_id'=>$cheeseCake->id,        
            'size_or_weight'=>'1 lb',        
            'price'=>900,        
            'stock_quantity'=>8      
        ]);

        $brownBread1pack = ProductVariant::create([
            'product_id'=>$brownBread->id,        
            'size_or_weight'=>'1 packet',        
            'price'=>50,        
            'stock_quantity'=>20      
        ]);

        $garlicBread1pc = ProductVariant::create([
            'product_id'=>$garlicBread->id,        
            'size_or_weight'=>'1 piece',        
            'price'=>70,        
            'stock_quantity'=>20      
        ]);

        $butterCookie500gm = ProductVariant::create([
            'product_id'=>$butterCookie->id,        
            'size_or_weight'=>'500 gm',        
            'price'=>250,        
            'stock_quantity'=>10      
        ]);

        $butterCookie1kg = ProductVariant::create([
            'product_id'=>$butterCookie->id,        
            'size_or_weight'=>'1 kg',        
            'price'=>450,        
            'stock_quantity'=>6      
        ]);

        $oreoCookie500gm = ProductVariant::create([
            'product_id'=>$oreoCookie->id,        
            'size_or_weight'=>'500 gm',        
            'price'=>300,        
            'stock_quantity'=>10      
        ]);

        $oreoCookie1kg = ProductVariant::create([
            'product_id'=>$oreoCookie->id,        
            'size_or_weight'=>'1 kg',        
            'price'=>550,        
            'stock_quantity'=>6      
        ]);

        $creamPastry1pc = ProductVariant::create([
            'product_id'=>$creamPastry->id,        
            'size_or_weight'=>'1 piece',        
            'price'=>120,        
            'stock_quantity'=>30      
        ]);

        $brownie1pc = ProductVariant::create([
            'product_id'=>$brownie->id,        
            'size_or_weight'=>'1 piece',        
            'price'=>150,        
            'stock_quantity'=>25      
        ]);

        $brownieBox = ProductVariant::create([
            'product_id'=>$brownie->id,        
            'size_or_weight'=>'6 pieces box',        
            'price'=>800,        
            'stock_quantity'=>12      
        ]);


        /*
        |--------------------------------------------------------------------------
        | Ingredients
        |--------------------------------------------------------------------------
        */

        $flour = Ingredient::create([
            'name'=>'Flour',
            'unit'=>'kg',
            'current_stock'=>50,
            'minimum_stock'=>10
        ]);

        $sugar = Ingredient::create([
            'name'=>'Sugar',
            'unit'=>'kg',
            'current_stock'=>30,
            'minimum_stock'=>10
        ]);

        $egg = Ingredient::create([
            'name'=>'Egg',
            'unit'=>'piece',
            'current_stock'=>200,
            'minimum_stock'=>50
        ]);

        $oil = Ingredient::create([
            'name'=>'Oil',
            'unit'=>'litre',
            'current_stock'=>200,
            'minimum_stock'=>50
        ]);

        $chocolate = Ingredient::create([
            'name'=>'Chocolate',
            'unit'=>'piece',
            'current_stock'=>200,
            'minimum_stock'=>50
        ]);

        $butter = Ingredient::create([
            'name'=>'Butter',
            'unit'=>'kg',
            'current_stock'=>20,
            'minimum_stock'=>5
        ]);
        
        $milk = Ingredient::create([
            'name'=>'Milk',
            'unit'=>'litre',
            'current_stock'=>50,
            'minimum_stock'=>10
        ]);
        
        $yeast = Ingredient::create([
            'name'=>'Yeast',
            'unit'=>'kg',
            'current_stock'=>10,
            'minimum_stock'=>2
        ]);
        
        $cocoa = Ingredient::create([
            'name'=>'Cocoa Powder',
            'unit'=>'kg',
            'current_stock'=>15,
            'minimum_stock'=>3
        ]);
        
        $vanilla = Ingredient::create([
            'name'=>'Vanilla Essence',
            'unit'=>'bottle',
            'current_stock'=>20,
            'minimum_stock'=>5
        ]);

        /*
        |--------------------------------------------------------------------------
        | Recipe
        |--------------------------------------------------------------------------
        */

        $chocolateRecipe = Recipe::create([
            'product_variant_id'=>$chocolateCake1lb->id,       
            'name'=>'Chocolate Cake 1 lb Recipe'        
        ]);


        RecipeIngredient::create([
            'recipe_id'=>$chocolateRecipe->id,
            'ingredient_id'=>$flour->id,
            'quantity_required'=>0.5
        ]);

        RecipeIngredient::create([
            'recipe_id'=>$chocolateRecipe->id,
            'ingredient_id'=>$sugar->id,
            'quantity_required'=>0.2
        ]);

        RecipeIngredient::create([
            'recipe_id'=>$chocolateRecipe->id,
            'ingredient_id'=>$egg->id,
            'quantity_required'=>3
        ]);

        $breadRecipe = Recipe::create([
            'product_variant_id'=>$brownBread1pack->id,        
            'name'=>'Brown Bread Recipe'
        ]);
        
        
        RecipeIngredient::create([
            'recipe_id'=>$breadRecipe->id,
            'ingredient_id'=>$flour->id,
            'quantity_required'=>0.4
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$breadRecipe->id,
            'ingredient_id'=>$yeast->id,
            'quantity_required'=>0.04
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$breadRecipe->id,
            'ingredient_id'=>$milk->id,
            'quantity_required'=>0.3
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$breadRecipe->id,
            'ingredient_id'=>$butter->id,
            'quantity_required'=>0.07
        ]);

        $brownieRecipe = Recipe::create([
            'product_variant_id'=>$brownie1pc->id,        
            'name'=>'Chocolate Brownie Recipe'       
        ]);
               
        RecipeIngredient::create([
            'recipe_id'=>$brownieRecipe->id,
            'ingredient_id'=>$flour->id,
            'quantity_required'=>0.2
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$brownieRecipe->id,
            'ingredient_id'=>$sugar->id,
            'quantity_required'=>0.15
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$brownieRecipe->id,
            'ingredient_id'=>$chocolate->id,
            'quantity_required'=>2
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$brownieRecipe->id,
            'ingredient_id'=>$cocoa->id,
            'quantity_required'=>0.05
        ]);
        
        RecipeIngredient::create([
            'recipe_id'=>$brownieRecipe->id,
            'ingredient_id'=>$butter->id,
            'quantity_required'=>0.1
        ]);
        
        /*
        |--------------------------------------------------------------------------
        | Orders
        |--------------------------------------------------------------------------
        */

        $order = Order::create([
            'user_id'=>2,
            'order_number'=>'BN1001',
            'total_amount'=>1800,
            'status'=>'completed',
            'delivery_type'=>'delivery',
            'delivery_address'=>'Mirpur, Dhaka',
            'payment_status'=>'paid'
        ]);
        
        OrderItem::create([
            'order_id'=>$order->id,
            'product_variant_id'=>$chocolateCake1lb->id,
            'quantity'=>2,
            'price'=>900,
            'subtotal'=>1800
        ]);

        /*
        |--------------------------------------------------------------------------
        | Demo Production
        |--------------------------------------------------------------------------
        */

        $production = Production::create([
            'product_variant_id'=>$chocolateCake1lb->id,
            'quantity'=>20,
            'production_date'=>now(),
            'notes'=>'Demo production of Chocolate Truffle Cake 1 lb'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Inventory Transactions
        |--------------------------------------------------------------------------
        */

        InventoryTransaction::create([
            'ingredient_id'=>$flour->id,
            'product_variant_id'=>$chocolateCake1lb->id,
            'type'=>'Consumed',
            'quantity'=>10,
            'reference_type'=>'Production',
            'reference_id'=>$production->id,
            'notes'=>'Flour consumed for production of 20 Chocolate Truffle Cake 1 lb'
        ]);

        InventoryTransaction::create([
            'ingredient_id'=>$sugar->id,
            'product_variant_id'=>$chocolateCake1lb->id,
            'type'=>'Consumed',
            'quantity'=>4,
            'reference_type'=>'Production',
            'reference_id'=>$production->id,
            'notes'=>'Sugar consumed for production of 20 Chocolate Truffle Cake 1 lb'
        ]);

        InventoryTransaction::create([
            'ingredient_id'=>$egg->id,
            'product_variant_id'=>$chocolateCake1lb->id,
            'type'=>'Consumed',
            'quantity'=>60,
            'reference_type'=>'Production',
            'reference_id'=>$production->id,
            'notes'=>'Egg consumed for production of 20 Chocolate Truffle Cake 1 lb'
        ]);

        InventoryTransaction::create([
            'product_variant_id'=>$chocolateCake1lb->id,
            'type'=>'Produced',
            'quantity'=>20,
            'reference_type'=>'Production',
            'reference_id'=>$production->id,
            'notes'=>'20 Chocolate Truffle Cake 1 lb added to inventory'
        ]);
    }
}