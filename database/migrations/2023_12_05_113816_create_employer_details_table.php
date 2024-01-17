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
        Schema::create('employer_details', function (Blueprint $table) {
            $table->id();         
            $table->string('categories');
            $table->string('name');
            $table->string('location');
            $table->string('contact_number');
            $table->string('logo');
            $table->year('since');
            $table->unsignedSmallInteger('team_members');
            $table->string('email')->unique;
            $table->string('website');
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employer_details');
    }
};
