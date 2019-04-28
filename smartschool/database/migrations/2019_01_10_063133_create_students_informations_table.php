<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Student_id');
            $table->text('Nick_name');
            $table->text('Class');
            $table->text('Section')->nullable();
            $table->text('Session');
            $table->text('Roll')->nullable();
            $table->text('Name');
            $table->text('Father_name');
            $table->text('Mother_name');
            $table->date('Birth_date');
            $table->text('Gender');
            $table->text('Blood_group')->nullable();
            $table->text('Mobile_no');
            $table->text('Address');
            $table->text('District');
            $table->text('Division');
            $table->text('Nationality');
            $table->String('Image')->nullable();
            $table->text('Extra_activities')->nullable();
            $table->date('Admission_date');
            $table->rememberToken();
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
        Schema::dropIfExists('students_informations');
    }
}
