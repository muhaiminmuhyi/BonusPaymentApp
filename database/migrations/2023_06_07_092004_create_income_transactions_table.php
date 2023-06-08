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
        Schema::create('income_transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('id_buruh');
            $table->foreign('id_buruh')->references('id')->on('buruhs');

            $table->foreignUuid('id_fee');
            $table->foreign('id_fee')->references('id')->on('fees');

            $table->integer('percentage');

            $table->integer('bonus_amount');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_transactions');
    }
};
