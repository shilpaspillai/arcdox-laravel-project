<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
             Schema::create('users',function($table){
                
                    $table->increments('id');
                    $table->integer('role');
                    $table->string('firstname',50);
                    $table->string('surname',50)->nullable(); 
                    $table->string('w_email',50)->nullable(); 
                    $table->string('email',50)->unique();
                    $table->string('profession',50)->nullable(); 
                    $table->string('linkedin',50)->nullable();
                    $table->string('twitter',50)->nullable();
                    $table->string('facebook',50)->nullable();
                    $table->string('haddress1',50)->nullable();
                    $table->string('haddress2',50)->nullable();
                    $table->string('city',50)->nullable();
                    $table->integer('postcode')->nullable();
                    $table->string('country',50)->nullable();
                    $table->integer('telephone')->nullable();
                    $table->integer('mobile')->nullable();
                    $table->integer('company_id')->nullable();
                    $table->string('password',100);
                    $table->string('password_reset_token');
                    $table->timestamps();
            });
		//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	 Schema::dropIfExists('users');   	//
	}

}
