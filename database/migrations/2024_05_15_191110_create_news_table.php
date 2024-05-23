<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cate');
            $table->unsignedBigInteger('id_user');
            $table->string('img');
            $table->string('title');
            $table->string('sub_title')->nullable();
            $table->date('date')->comment('ngày viết bài');
            $table->longText('content');
            $table->integer('view')->default(0);
            $table->integer('thumb_up')->default(0);
            $table->integer('heart')->default(0);
            $table->timestamps();

            $table->foreign('id_cate')->references('id')->on('news_cate')->onDelete('restrict');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
