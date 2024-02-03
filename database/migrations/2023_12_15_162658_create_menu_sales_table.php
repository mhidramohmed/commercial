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
        Schema::create('menu_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained()->onDelete('cascade');
            $table->foreignId('sales_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_sale', function (Blueprint $table) {
            $table->dropColumn(['sales_id','menu_id']);
        });
    }
};
