<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNominationTypesTable extends Migration {

	public function up()
	{
		Schema::create('nomination_types', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->string('name');
			$table->integer('code');
		});
	}

	public function down()
	{
		Schema::drop('nomination_types');
	}
}