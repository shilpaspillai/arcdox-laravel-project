<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('companydetail',function($table){
            
            $table->increments('id');
            $table->string('company_name',50)->nullable();
            $table->string('industry',50)->nullable();
            $table->string('adress1',50)->nullable();
            $table->string('adress2',50)->nullable();
            $table->string('city',50)->nullable();
            $table->integer('c_pcode')->nullable();
            $table->string('country')->nullable();
            $table->integer('tele')->nullable();
            $table->integer('fax')->nullable();
            $table->string('company_email',50)->nullable();
            $table->string('website')->nullable();
            $table->string('ln_com_profile',50)->nullable();
            $table->string('tw_com_profile',50)->nullable();
            $table->string('fb_com_profile',50)->nullable();
            $table->integer('user_id')->unsigned()->references('id')->on('users')->nullable();
            $table->timestamps();
        }
        );	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
	Schema::dropIfExists('companydetail');	//
	}

}
