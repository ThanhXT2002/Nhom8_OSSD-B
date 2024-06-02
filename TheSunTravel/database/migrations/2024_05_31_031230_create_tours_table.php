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
        Schema::create('Tours', function (Blueprint $table) {
            $table->id();
            $table->string('idT')->nullable(); // Thêm trường idT
            $table->string('name'); 
            $table->longtext('description')->nullable(); // Thêm trường description
            $table->string('place')->nullable();  
            $table->integer('price')->nullable();
            $table->string('time')->nullable(); 
            $table->integer('quantity')->nullable();
            $table->longtext('intro')->nullable(); 
            $table->longtext('image')->nullable();  

            $table->boolean('status')->default(true);
            $table->boolean('category')->default(true);
            $table->text('url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Tours');
    }
};
