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
        Schema::table('candidate_details', function (Blueprint $table) {
            $table->string('professional_skill')->nullable()->after('shortlisted');
            $table->string('software_skill')->nullable()->after('professional_skill');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_details', function (Blueprint $table) {
            $table->dropColumn('professional_skill');
            $table->dropColumn('software_skill');

        });
    }
};
