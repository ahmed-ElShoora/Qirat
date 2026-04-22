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
        Schema::table('units', function (Blueprint $table) {
            $table->string('floor_ar')->nullable();
            $table->string('floor_en')->nullable();
            $table->string('parking_ar')->nullable();
            $table->string('parking_en')->nullable();
            $table->string('view_ar')->nullable();
            $table->string('view_en')->nullable();
            $table->string('status_ar')->nullable();
            $table->string('status_en')->nullable();

            $table->enum('priority', ['A', 'B', 'C', 'D'])->default('D');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropColumn('floor_ar');
            $table->dropColumn('floor_en');
            $table->dropColumn('parking_ar');
            $table->dropColumn('parking_en');
            $table->dropColumn('view_ar');
            $table->dropColumn('view_en');
            $table->dropColumn('status_ar');
            $table->dropColumn('status_en');
            $table->dropColumn('priority');
        });
    }
};
