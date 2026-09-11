<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{

    protected $fillable = [

        'ingredient_id',
        'product_variant_id',
        'type',
        'quantity',
        'reference_type',
        'reference_id',
        'notes',

    ];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

}