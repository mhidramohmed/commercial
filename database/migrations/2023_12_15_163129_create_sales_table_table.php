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
        Schema::create('sales_table', function (Blueprint $table) {
            $table->id();
            $table->foreignId('table_id')->constrained();
            $table->foreignId('sales_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sale_table', function (Blueprint $table) {
            $table->dropColumn(['sales_id','table_id']);
        });
    }
};
