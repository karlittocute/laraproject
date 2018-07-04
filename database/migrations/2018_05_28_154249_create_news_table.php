<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
			$table->string('operator_id')->nullable();// Идентификатор оператора, который последний редактировал запись
			$table->string('title')->nullable(); // Заголовок
			$table->text('description')->nullable(); // Описание
			$table->text('content')->nullable(); // Содержание
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
        Schema::dropIfExists('news');
    }
}
