<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinancialDegreesTable extends Migration {

	public function up()
	{
		Schema::create('financial_degrees', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->string('code');
		});
	}

	public function down()
	{
		Schema::drop('financial_degrees');
	}
}