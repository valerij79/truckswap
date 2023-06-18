<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subunits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('truck_id');
            $table->unsignedBigInteger('subunit_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();

            $table->foreign('truck_id')->references('id')->on('trucks');
            $table->foreign('subunit_id')->references('id')->on('trucks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subunits');
    }
};
