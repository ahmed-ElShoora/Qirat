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
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('title_ar');
            $table->string('title_en');
            $table->string('primary_image');
            $table->string('type_id');
            $table->string('developer_id');
            $table->enum('other_type', ['resale', 'developer'])->default('developer');
            $table->enum('project_state', ['unit', 'launche'])->default('unit');
            $table->decimal('developer_price', 15, 2);
            $table->decimal('resale_price', 15, 2)->nullable();
            $table->string('phone_number');
            $table->string('whatsapp');
            $table->string('lat');
            $table->string('lng');
            $table->integer('bed_number')->nullable();
            $table->integer('bathroom_number')->nullable();
            $table->integer('down_payment_percentage');
            $table->string('master_plan');
            $table->string('digital_brochure')->nullable();
            $table->decimal('pay_amount_per_years',15, 2);
            $table->integer('payment_percentage_per_year');
            $table->integer('years_count')->default(0);
            $table->boolean('is_promotion')->default(false);
            $table->boolean('is_hide')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
