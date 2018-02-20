<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operators', function (Blueprint $table) {
		
            $table->increments('id');
			$table->string('user_id')->nullable();// Идентификатор пользователя 
			$table->unsignedInteger('filialId')->nullable(); // Код филиала
			$table->boolean('publicResponsibility'); // Ответственный за "внешние" резюме и вакансии
			$table->string('surname')->nullable(); // Фамилия
			$table->string('name')->nullable(); // Имя
			$table->string('fathersname')->nullable(); // Отчество 
			$table->string('phone')->nullable(); // Телефон
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
        Schema::dropIfExists('operators');
    }
}
