<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('lrn_number', 50)->unique('lrn_number');
            $table->string('firstname', 100);
            $table->string('middlename', 100);
            $table->string('lastname', 100);
            $table->enum('grade_level', ['Grade 10', 'Grade 12']);
            $table->string('section', 30);
            $table->string('age', 20);
            $table->enum('gender', ['Male', 'Female']);
            $table->string('phone_number', 50);
            $table->date('birth_date');
            $table->string('home_address', 100);
            $table->string('parent_name', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_personal_details');
    }
};
