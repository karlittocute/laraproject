<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->unsignedInteger('filialId')->nullable();
            $table->unsignedInteger('operatorId')->nullable();
            $table->string('name');
            $table->unsignedTinyInteger('field');
            $table->string('profile');
            $table->unsignedInteger('cityId');
            $table->string('address');
            $table->string('persons');
            $table->string('phone');
            $table->string('email');
            $table->unsignedInteger('contractNumber');
            $table->text('additionalInfo');
            $table->unsignedTinyInteger('active')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
