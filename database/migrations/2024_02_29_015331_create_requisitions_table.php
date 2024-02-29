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
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('job_description', 900);
            $table->foreignId('job_id')->references('id')->on('jobs');
            $table->string('justification', 900);
            $table->string('ideal_candidate', 1500);
            $table->string('job_mision', 500);
            $table->string('responsabilities',1500);
            $table->string('candidate_description', 1500);
            $table->string('selection_criteria', 1700);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisitions');
    }
};
