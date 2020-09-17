<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('type_id');
            $table->string('thumbnail')->nullable();
            $table->date('published_at');
            $table->tinyInteger('is_active')->default(1)->comment('0: pending, not show to customer.');
            $table->integer('sort')->default(0)->comment('controller the order of blog lists, desc');
            $table->tinyInteger('is_top')->default(0)->comment('only one blog on the top position, if set new one, the old one must be off the top position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
