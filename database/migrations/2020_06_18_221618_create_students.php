<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_code');
            $table->string('password');
            $table->string('full_name');
            $table->string('sex');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->string('identification_id');
            $table->string('avatar_img_path');
            $table->string('token');
            $table->string('class_id');
            $table->string('user_created_uuid');
            $table->string('soft_deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
