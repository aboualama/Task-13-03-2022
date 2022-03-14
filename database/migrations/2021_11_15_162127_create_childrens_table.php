<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrensTable extends Migration {

	public function up()
	{
		Schema::create('childrens', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->enum('gender', array('male', 'female'));
			$table->datetime('birth_date');
			$table->foreignId('employee_id');
		});
	}

	public function down()
	{
		Schema::drop('childrens');
	}
}
