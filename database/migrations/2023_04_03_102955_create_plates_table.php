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
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->string('name', 100)->required();
            $table->text('description')->required();
            $table->decimal('price', 5, 2)->unsigned()->required();
            $table->boolean('is_visible')->required()->default(0);
            $table->text('photo')->required();
            $table->boolean('is_vegan');
            $table->boolean('is_vegetarian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plates');
    }
};