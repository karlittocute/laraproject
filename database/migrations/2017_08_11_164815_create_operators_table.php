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
			$table->unsignedInteger('filial_id')->nullable(); // Код филиала
			$table->enum('type',['LocalAdmin','GlobalAdmin','LocalOperator','GlobalOperator']); // Пояснение ниже
			$table->string('surname')->nullable(); // Фамилия
			$table->string('name')->nullable(); // Имя
			$table->string('fathersname')->nullable(); // Отчество 
			$table->string('phone')->nullable(); // Телефон
            $table->timestamps();
			
        });
    }

    /**
    LocalAdmin - Доступ к записям своего филиала, также может добавлять операторов в свой филиал
	GlobalAdmin - Доступ к записям всех филиалов, может добавлять операторов и администраторов 
	LocalOperator - Доступ только к локальным записям
	GlobalOperator - Доступ ко всем записям
     */
    public function down()
    {
        Schema::dropIfExists('operators');
    }
}
