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
       Schema::create('sessions', function (Blueprint $table) {
            // Session columns
            $table->string('id')->primary(); // Session ID (string, not integer)
            $table->text('payload');         // Session data (usually serialized or encrypted)
            $table->integer('last_activity'); // Timestamp of the last activity
            $table->string('user_id'); // Timestamp of the last activity
             $table->string('ip_address'); // Timestamp of the last activity
             $table->string('user_agent'); // Timestamp of the last activity
            // Additional item-related fields
            $table->string('item');          // Item name or description
            $table->string('price');         // Price of the item
            $table->string('category');      // Category of the item
            $table->string('quantity');      // Quantity of the item
            $table->string('images');        // Images associated with the item (e.g., URLs or file paths)
            $table->string('barcode');       // Barcode or SKU of the item

            // Timestamps for created_at and updated_at
            $table->timestamps();           // Laravel automatically handles created_at and updated_at columns
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
