<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->softDeletes(); 
            $table->string('title'); 
            $table->string('slug');
            $table->longText('content'); 
            $table->string('image')->nullable(); 
			$table->enum('status', array('Published', 'Pending', 'Draft')); 
            $table->integer('views'); 
            $table->foreignId('category_id')->constrained('categories')->unsigned()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
