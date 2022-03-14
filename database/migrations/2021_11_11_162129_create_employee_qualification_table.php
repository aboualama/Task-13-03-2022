<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeQualificationTable extends Migration {

	public function up()
	{
		Schema::create('employee_qualification', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->softDeletes();
			$table->string('qualification_date')->nullable();
			$table->enum('qualification_round', ['أول', 'ثاني'])->nullable();
			$table->string('qualification_degree')->nullable();
			$table->string('qualification_major')->nullable();
			$table->string('qualification_source')->nullable();
			$table->foreignId('employee_id')->nullable();
			$table->foreignId('qualification_id')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('employee_qualification');
	}
}
