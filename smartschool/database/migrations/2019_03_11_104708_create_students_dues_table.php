<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_dues', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Class');
            $table->text('Session');
            $table->text('Name');
            $table->String('Roll');
            $table->text('Monthly_due');
            $table->text('Exam_due');
            $table->text('other');
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
        Schema::dropIfExists('students_dues');
    }
}
