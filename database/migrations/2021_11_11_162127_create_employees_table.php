<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration {

	public function up()
	{
		Schema::create('employees', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->string('first_name')->nullable();
			$table->string('middle_name')->nullable();
			$table->string('last_name')->nullable();
			$table->string('family_name')->nullable();
			$table->string('national_id')->unique()->nullable();
			$table->string('birth_address')->nullable();
			$table->string('birth_center')->nullable();
			$table->string('birth_city')->nullable();
			$table->datetime('birth_date')->nullable();
			$table->datetime('join_date')->nullable();
			$table->string('military_summons')->nullable();
			$table->foreignId('gender_id')->nullable();
			$table->foreignId('health_status_id')->nullable();
			$table->foreignId('social_status_id')->nullable();
			$table->foreignId('military_treatment_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('employees');
	}
}
