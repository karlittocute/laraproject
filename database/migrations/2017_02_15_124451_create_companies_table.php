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
            $table->unsignedInteger('filial_id')->default(0);
            $table->unsignedInteger('operator_id')->default(0);
            $table->string('name');
            $table->unsignedTinyInteger('field')->default(0);
            $table->string('profile');
            $table->string('cityId');
            $table->string('address');
            $table->string('persons');
            $table->string('phone');
            $table->string('email');
            $table->unsignedInteger('contractNumber')->default(0);
            $table->text('additionalInfo');
            $table->unsignedTinyInteger('active')->default(1);
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
