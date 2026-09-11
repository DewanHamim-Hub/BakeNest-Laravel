<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('custom_orders', function (Blueprint $table) {
            $table->id();
    
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();
    
            $table->string('product_type');
    
            $table->string('size')
                  ->nullable();
    
            $table->string('flavor')
                  ->nullable();
    
            $table->text('design_instruction')
                  ->nullable();
    
            $table->text('custom_message')
                  ->nullable();
    
            $table->string('reference_image')
                  ->nullable();
    
            $table->date('required_date')
                  ->nullable();
    
            $table->decimal('quoted_price', 10, 2)
                  ->nullable();
    
            $table->enum('status', [
                'pending',
                'quoted',
                'accepted',
                'rejected',
                'completed'
            ])->default('pending');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_orders');
    }
};
