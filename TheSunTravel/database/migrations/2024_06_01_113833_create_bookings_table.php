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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->unsignedBigInteger('tour_departure_id');
            $table->string('customer_name');
            $table->string('customer_email')->nullable();
            $table->string('customer_phone');
            $table->integer('people_count');
            $table->integer('total_price');
            $table->string('note')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            // chỉ mục tăng hiệu xuất truy vấn trong csdl
            $table->index('tour_id');
            $table->index('tour_departure_id');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
