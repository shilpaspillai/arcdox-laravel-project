<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('trainings',function($table){
               $table->increments('id');
               $table->string('tr_title',50)->nullable();
               $table->string('tr_description',100)->nullable();
               $table->string('tr_image',50)->nullable();
               $table->timestamps();
            }
            );
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	Schema::dropIfExists('trainings');	//
	}

}
