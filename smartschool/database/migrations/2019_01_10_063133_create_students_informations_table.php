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
            $table->text('final')->nullable();
            $table->text('Student_id');
            $table->text('Name');
            $table->text('Nick_name');
            $table->text('Class');
            $table->text('Section')->nullable();
            $table->text('Session');
            $table->text('Roll')->nullable();
            
            $table->text('Psc_grade')->nullable();
            $table->text('Jsc_grade')->nullable();
            $table->text('Previous_school')->nullable();
            $table->text('Department')->nullable();
            
            $table->date('Birth_date');
            $table->text('Gender');
            $table->text('Blood_group')->nullable();
            $table->text('Religion');
            $table->text('Physically_challenged')->nullable();
            $table->text('Address');
            $table->text('Mobile_no')->nullable();
            $table->text('Email')->nullable();
            
            $table->text('Extra_activities')->nullable();
        
            $table->String('Image')->nullable();
            $table->text('Fathers_name');
            $table->text('Fathers_mobile_no');
            $table->text('Fathers_occupation');
            $table->text('Mothers_name');
            $table->text('Mothers_mobile_no')->nullable();
            $table->text('Mothers_occupation');
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
