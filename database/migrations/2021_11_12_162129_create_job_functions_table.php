<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobFunctionsTable extends Migration {

	public function up()
	{
		Schema::create('job_functions', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->string('job_function_name');
			$table->foreignId('sub_group_id');
		});
	}

	public function down()
	{
		Schema::drop('job_functions');
	}
}
