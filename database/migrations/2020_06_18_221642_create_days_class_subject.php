<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaysClassSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('days_class_subject', function (Blueprint $table) {
            $table->id();
            $table->string('class_subject_id');
            $table->string('user_manager_uuid');
            $table->string('date');
            $table->string('note');
            $table->string('checked');
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
        Schema::dropIfExists('days_class_subject');
    }
}
