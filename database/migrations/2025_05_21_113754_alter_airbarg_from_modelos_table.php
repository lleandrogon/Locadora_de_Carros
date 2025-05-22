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
        Schema::table('modelos', function (Blueprint $table) {
            $table->renameColumn('air-bag', 'air_bag');
        });

        Schema::table('modelos', function (Blueprint $table) {
            $table->boolean('air_bag')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('modelos', function (Blueprint $table) {
            $table->boolean('air_bag')->default(null)->change();
        });

        Schema::table('modelos', function (Blueprint $table) {
            $table->renameColumn('air_bag', 'air-bag');
        });
    }
};
