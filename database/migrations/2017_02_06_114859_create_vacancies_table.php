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
            $table->increments('id');
            $table->unsignedInteger('company_id');
            $table->unsignedInteger('operator_id');
            $table->string('name');
            $table->unsignedTinyInteger('place');
            $table->unsignedTinyInteger('field');
            $table->boolean('salary_var')->default(False);
            $table->unsignedInteger('salary_from');
            $table->unsignedInteger('salary_to');
            $table->string('test_period');
            $table->string('schedule');
            $table->text('reqs');
            $table->string('nearest_metro');
            $table->string('work_form'); //может быть: временная, постоянная (возможны разные сочетания). Хранится битовая маска: 11, 10, 01. Обязательно для заполнения.
            $table->string('work_form_descr'); //Дополнительное поле, описывающее разные ситуации с формой работы.
            $table->text('duties');
            //Требования к соискателю
            $table->unsignedTinyInteger('sex');
            $table->boolean('age_any')->default(0);
            $table->unsignedTinyInteger('age_from');
            $table->unsignedTinyInteger('age_to');
            $table->string('education');
            $table->unsignedTinyInteger('work_exp');
            $table->string('work_exp_descr');
            $table->string('lang');
            $table->string('visa');
            $table->unsignedTinyInteger('pc_level');
            $table->string('edu_spec');
            $table->text('notes');
            //Прочие поля
            $table->unsignedTinyInteger('active');
            $table->timestamps();
            $table->timestamp('vacancy_lifetime')->nullable();
            $table->boolean('contact')->default(1);
            $table->boolean('public');
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
