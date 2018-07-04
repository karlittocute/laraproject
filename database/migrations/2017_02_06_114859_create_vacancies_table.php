<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            //Информация о вакансии
            $table->increments('id')->nullable();
            $table->unsignedInteger('company_id')->default(0);
            $table->unsignedInteger('operator_id')->default(0);
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('place')->default(0);
            $table->unsignedTinyInteger('field')->default(0);
            $table->boolean('salaryVar')->default(False);
            $table->unsignedInteger('salaryFrom')->default(0);
            $table->unsignedInteger('salaryTo')->default(0);
            $table->string('testPeriod')->nullable();
            $table->string('schedule')->nullable();
            $table->text('reqs')->nullable();
            $table->string('nearestMetro')->nullable();
            $table->string('workForm')->nullable(); //может быть: временная, постоянная (возможны разные сочетания). Хранится битовая маска: 11, 10, 01. Обязательно для заполнения.
            $table->string('workFormDescr')->nullable(); //Дополнительное поле, описывающее разные ситуации с формой работы.
            $table->text('duties')->nullable();
            //Требования к соискателю
            $table->unsignedTinyInteger('sex')->default(0);
            $table->boolean('ageAny')->default(0)->nullable();
            $table->unsignedTinyInteger('ageFrom')->default(0);
            $table->unsignedTinyInteger('ageTo')->default(0);
            $table->string('education')->nullable();
            $table->unsignedTinyInteger('workExp')->default(0);
            $table->string('workExpDescr')->nullable();
            $table->string('lang')->nullable();
            $table->string('visa')->nullable();
            $table->unsignedTinyInteger('pcLevel')->default(0);
            $table->string('eduSpec')->nullable();
            $table->text('notes')->nullable();
            //Прочие поля
            $table->unsignedTinyInteger('active')->default(1);
            $table->timestamps();
            $table->timestamp('vacancyLifetime')->nullable();
            $table->boolean('contact')->default(1);
            $table->boolean('public')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
}
