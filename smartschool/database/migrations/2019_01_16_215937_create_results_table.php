<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('id');
            $table->String('Exam_name');
            $table->String('Class');
            $table->String('Session');

            $table->String('Name');
            $table->String('Roll');
            
            $table->float('Bangla_1st');
            $table->float('Bangla_2nd');
            $table->float('English_1st');
            $table->float('English_2nd');
            $table->float('General_math');
            $table->float('Ict');
            $table->float('Religion');
            $table->float('Socialscience');

            $table->float('Physics')->nullable();
            $table->float('Chemistry')->nullable();
            $table->float('Biology')->nullable();
           
            $table->float('Science')->nullable();

            $table->float('Highermath')->nullable(); 
            $table->float('Home_economics')->nullable();
            $table->float('Agriculture')->nullable();

            $table->float('Pouroniti')->nullable();
            $table->float('Vugol')->nullable();
            $table->float('Economics')->nullable();
            
            $table->float('Finance')->nullable();
            $table->float('Babsa_uddog')->nullable();
            $table->float('Hisab_biggan')->nullable();
            $table->float('Total');
            $table->string('Grade')->nullable();
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
        Schema::dropIfExists('results');
    }
}
