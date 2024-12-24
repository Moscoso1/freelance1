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
        Schema::create('Item_db', function(Blueprint $table){
              $table->string('id')->primary();  // Session ID (string, not integer)
            $table->text('payload');          // Session data (usually serialized or encrypted)
            $table->integer('last_activity'); // Timestamp of the last activity

            $table->String('item');
            $table->String('price');
            $table->String('category');
            $table->String('quantity');
            $table->String('images');
            $table->String('barcode');
            $table->timestamps();
            
          

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
