<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateResumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('resumes', function (Blueprint $table) {
		
      $table->increments('id');  // Идентификатор резюме
			$table->unsignedInteger('filial_id')->nullable(); // Код филиала
			$table->unsignedInteger('operator_id')->nullable(); // Код оператора
			
			// Информация о соискателе
			$table->string('name')->nullable(); // Фамилия имя отчество пользователя
			$table->string('user_id')->nullable();// Идентификатор пользователя 
			$table->unsignedTinyInteger('sex')->default(0); // Пол 
			$table->date('bDay')->nullable(); // Дата рождения
			$table->string('city')->nullable(); // Идентификатор город
			$table->string('region')->nullable(); // Район проживания
			$table->string('phone')->nullable(); // Телефон
			$table->string('citizenship')->nullable(); // Гражданство
			$table->unsignedTinyInteger('visa')->default(0);  // Прописка
			
			// Основное профессиональное образование
			$table->string('edu1Name')->nullable(); // Название уч. заведения 1
			$table->string('edu1Spec')->nullable(); // Специальность
			$table->unsignedTinyInteger('edu1Field')->default(0); // Область
			$table->text('edu1FieldText')->nullable(); // Уточнение области
			$table->unsignedTinyInteger('edu1Degree')->default(0); //  Степень
			$table->string('edu1Year')->nullable(); //  Год окончания
			$table->unsignedTinyInteger('edu1Form')->default(0); // Форма обучения
			
			//Дополнительное профессиональное образование
			$table->string('edu2Name')->nullable(); // Название уч. заведения 2
			$table->string('edu2Spec')->nullable(); // Специальность
			$table->unsignedTinyInteger('edu2Field')->default(0); // Область
			$table->text('edu2FieldText')->nullable(); // Уточнение области
			$table->string('edu2Year')->nullable(); // Год окончания
			
			// Дополнительные навыки
			$table->unsignedTinyInteger('lang')->default(0); // Язык
			$table->unsignedTinyInteger('langLevel')->nullable(); //  Уровень владения языком 
			$table->unsignedTinyInteger('pcLevel')->nullable(); //  Уровень владения компьютером
			$table->unsignedTinyInteger('driverLicense')->nullable(); // Водительское удостоверениe
			$table->text('skill')->nullable(); // Навыки, знания
			
			// Желаемая вакансия
			$table->string('vacancy')->nullable(); //  Название вакасии, должность
			$table->string('salary')->nullable(); // Зарплата в месяц от
			$table->unsignedTinyInteger('vacancyField')->default(0); // Область в которой будет вакансия
			$table->unsignedTinyInteger('work')->default(0); // Опыт работы
			$table->unsignedTinyInteger('busy')->default(0); // Занятость
			$table->unsignedTinyInteger('schedule')->default(0); // График работы
			$table->string('scheduleText')->nullable(); //  График работы (текст)
			$table->text('workExp')->nullable(); // Опыт работы
			
			//Прочие поля (не заполняются соискателем):
			$table->timestamps();  // Дата заполнения / Дата изменения
			$table->timestamp('resumeLifetime')->nullable();  // Время жизни резюме
			$table->unsignedTinyInteger('active')->default(1); // Статус резюме
			$table->boolean('contact')->default(1); // Контакт через оператора
			$table->boolean('public')->default(0); //  Если значение равно 1, значит запись нуждается в проверке оператором
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::dropIfExists('resumes');
    }
}

