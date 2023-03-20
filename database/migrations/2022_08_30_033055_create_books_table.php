<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('category_id');
            // $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('authorName');
            $table->string('publisher');
            $table->integer('page_number');
            $table->string('ISBN_number');
            $table->string('language');
            $table->dateTime('published_date')->nullable();
            $table->boolean('featured')->nullable()->default(false);
            $table->string('cover_image')->nullable();
            $table->string('book_file')->nullable();
            $table->string('file_type')->nullable();
            $table->text('Short_description')->nullable();
            $table->text('description');
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
        Schema::dropIfExists('books');
    }
};
