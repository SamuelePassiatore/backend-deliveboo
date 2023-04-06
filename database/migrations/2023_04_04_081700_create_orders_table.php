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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('mail', 60);
            $table->string('phone', 15);
            $table->string('address', 255);
            $table->decimal('total_amount', 6, 2)->unsigned();
            $table->char('order_code', 8)->unique();
            $table->boolean('status');
            $table->text('note')->nullable();
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
