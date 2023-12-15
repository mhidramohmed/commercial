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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('servant_id')->constrained();
            $table->integer('quantity');
            $table->decimal('total_price')->default(0);
            $table->decimal('total_received')->default(0);
            $table->decimal('change')->default(0);
            $table->string('payment_type')->default('cash');
            $table->string('payment_status')->default('paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
