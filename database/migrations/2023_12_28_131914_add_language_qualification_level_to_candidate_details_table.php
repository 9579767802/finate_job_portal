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
           $table->string('language')->nullable()->after('experience');
$table->string('qualification')->after('gender');
$table->string('level')->nullable()->after('qualification');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidate_details', function (Blueprint $table) {
           $table->dropColumn(['language', 'qualification', 'level']);

        });
    }
};
