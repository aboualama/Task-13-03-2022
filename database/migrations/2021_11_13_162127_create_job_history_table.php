<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobHistoryTable extends Migration {

	public function up()
	{
		Schema::create('job_history', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->datetime('join_date')->nullable();
			$table->datetime('degree_date')->nullable();
			$table->string('job_function_name')->nullable();
			$table->foreignId('employee_id')->nullable();
			$table->foreignId('cader_id')->nullable();
			$table->foreignId('financial_degree_id')->nullable();
			$table->foreignId('nomination_type_id')->nullable();
			$table->foreignId('job_status_id')->nullable();
			$table->foreignId('job_style_id')->nullable();
			$table->foreignId('sub_group_id')->nullable();
			$table->boolean('currently')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('job_history');
	}
}
