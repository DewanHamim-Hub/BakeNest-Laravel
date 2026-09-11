<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{

    protected $fillable = [

        'product_variant_id',
        'quantity',
        'production_date',
        'notes',

    ];


    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

}