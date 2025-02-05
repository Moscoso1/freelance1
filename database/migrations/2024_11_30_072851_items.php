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
       Schema::create('item_db', function (Blueprint $table) {
            // Session columns
            $table->id(); // Session ID (string, not integer)
            $table->string('item');          // Item name or description
            $table->string('price');         // Price of the item
            $table->string('category');      // Category of the item
            $table->string('quantity');      // Quantity of the item
            $table->string('images');        // Images associated with the item (e.g., URLs or file paths)
            $table->string('barcode');       // Barcode or SKU of the item
            $timestamps();
          
        });
     
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
