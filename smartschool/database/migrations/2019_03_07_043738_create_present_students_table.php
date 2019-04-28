<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresentStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('present_students', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Class');
            $table->text('Session');
            $table->text('Section')->nullable();
            $table->text('Name');
            $table->integer('Roll');

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
        Schema::dropIfExists('present_students');
    }
}
