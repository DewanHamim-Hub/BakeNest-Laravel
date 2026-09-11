<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    protected $fillable = [
        'user_id',
        'product_type',
        'size',
        'flavor',
        'design_instruction',
        'custom_message',
        'reference_image',
        'required_date',
        'quoted_price',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}