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
            $table->unsignedInteger('company_id')->nullable();
            $table->unsignedInteger('operator_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedTinyInteger('place')->nullable();
            $table->unsignedTinyInteger('field')->nullable();
            $table->boolean('salary_var')->default(False);
            $table->unsignedInteger('salary_from')->nullable();
            $table->unsignedInteger('salary_to')->nullable();
            $table->string('test_period')->nullable();
            $table->string('schedule')->nullable();
            $table->text('reqs')->nullable();
            $table->string('nearest_metro')->nullable();
            $table->string('work_form')->nullable(); //может быть: временная, постоянная (возможны разные сочетания). Хранится битовая маска: 11, 10, 01. Обязательно для заполнения.
            $table->string('work_form_descr')->nullable(); //Дополнительное поле, описывающее разные ситуации с формой работы.
            $table->text('duties')->nullable();
            //Требования к соискателю
            $table->unsignedTinyInteger('sex')->nullable();
            $table->boolean('age_any')->default(0)->nullable();
            $table->unsignedTinyInteger('age_from')->nullable();
            $table->unsignedTinyInteger('age_to')->nullable();
            $table->string('education')->nullable();
            $table->unsignedTinyInteger('work_exp')->nullable();
            $table->string('work_exp_descr')->nullable();
            $table->string('lang')->nullable();
            $table->string('visa')->nullable();
            $table->unsignedTinyInteger('pc_level')->nullable();
            $table->string('edu_spec')->nullable();
            $table->text('notes')->nullable();
            //Прочие поля
            $table->unsignedTinyInteger('active')->nullable();
            $table->timestamps();
            $table->timestamp('vacancy_lifetime')->nullable();
            $table->boolean('contact')->default(1);
            $table->boolean('public')->nullable();
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
