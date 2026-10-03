<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedTinyInteger('nitrogen')->change();
            $table->unsignedTinyInteger('phosphorus')->change();
            $table->unsignedTinyInteger('potassium')->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('nitrogen', 5, 2)->change();
            $table->decimal('phosphorus', 5, 2)->change();
            $table->decimal('potassium', 5, 2)->change();
        });
    }
};