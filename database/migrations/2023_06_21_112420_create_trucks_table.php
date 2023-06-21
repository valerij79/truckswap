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
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('unit_number', 255)->unique(); // Sunkvežimio identifikacinis numeris
            $table->integer('year'); // Sunkvežimio pirmos registracijos metai
            $table->text('notes')->nullable(); // Laisva forma įvedami komentarai
            $table->timestamps(); // Laravel automatiškai sukurs created_at ir updated_at stulpelius
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trucks');
    }
};
