<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->unsignedBigInteger('genre_id');
            $table->unsignedBigInteger('house_id');
            $table->text('description');
            $table->string('picture');
            $table->timestamps();

            $table->foreign('author_id')
                    ->references('id')->on('authors')
                    ->onDelete('cascade');

            $table->foreign('genre_id')
                    ->references('id')->on('genres')
                    ->onDelete('cascade');

            $table->foreign('house_id')
                    ->references('id')->on('houses')
                    ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
