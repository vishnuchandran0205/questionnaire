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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('reg_number');
            $table->string('email')->unique();
            $table->string('gender');
            $table->integer('age');
            $table->string('address');
            $table->string('tc_path'); 
            $table->string('mark_sheet_path'); 
            $table->string('latitude'); 
            $table->string('longitude'); 
            $table->tinyInteger('admission_status')->default('0'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
