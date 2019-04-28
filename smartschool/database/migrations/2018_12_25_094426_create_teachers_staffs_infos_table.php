<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersStaffsInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers_staffs_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Teacher_Staff');
            $table->String('Name');
            $table->String('Nick_name');
            $table->String('Father_name');
            $table->String('Mother_name');
            $table->date('Birth_date');
            $table->String('Gender');
            $table->String('Blood_group');
            $table->String('Mobile_no');
            $table->String('Address');
            $table->String('District');
            $table->String('Division');
            $table->String('Nationality');
            $table->String('Image')->nullable();
            $table->String('Employee_id');
            $table->String('Designation');
            $table->String('Other_role')->nullable();
            $table->String('Qualification');
            $table->String('Specialized_Subject')->nullable();
            $table->String('Gmail_account')->nullable();
            $table->String('Google_drive')->nullable();
            $table->String('Social_media')->nullable();
            $table->date('Join_date');
            $table->String('Ssc');
            $table->String('Hsc');
            $table->String('Faculty');
            $table->String('C_U');
            $table->String('Degree');
            $table->String('Training')->nullable();
            $table->String('Other')->nullable();
            
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
        Schema::dropIfExists('teachers_staffs_infos');
    }
}
