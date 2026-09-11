<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    
    protected $casts = [

        'current_stock' => 'decimal:2',

        'minimum_stock' => 'decimal:2',

    ];

    protected $fillable = [
        'name',
        'unit',
        'current_stock',
        'minimum_stock',
    ];

    public function recipeIngredients()
    {
        return $this->hasMany(RecipeIngredient::class);
    }
}