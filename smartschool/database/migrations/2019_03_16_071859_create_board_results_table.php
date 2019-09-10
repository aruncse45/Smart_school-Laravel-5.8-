<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoardResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board_results', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Year');
            $table->String('Exam_type');
            $table->String('Total_student');
            $table->String('Pass');
            $table->String('Fail');
            $table->String('A_plus');
            $table->String('Percentage');
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
        Schema::dropIfExists('board_results');
    }
}
