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
        Schema::create('shortlisted_candidates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_details_id');
            $table->unsignedBigInteger('candidate_details_id');

            $table->foreign('employer_details_id')->references('id')->on('employer_details');
            $table->foreign('candidate_details_id')->references('id')->on('candidate_details');
            $table->boolean('shortlisted')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortlisted_candidates');
    }
};
