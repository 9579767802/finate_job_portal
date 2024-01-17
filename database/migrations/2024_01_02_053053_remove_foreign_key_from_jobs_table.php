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

        Schema::table('jobs', function (Blueprint $table) {
            // Drop foreign key
            $table->dropForeign(['employer_id']);

            // Change the column to unsignedBigInteger
            $table->unsignedBigInteger('employer_id')->nullable()->change();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            // Add back the foreign key
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('set null');

            // Change the column back to foreign key
            $table->foreignId('employer_id')->constrained('employers')->onDelete('set null')->change();
        });
    }
};
