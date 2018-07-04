<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filials', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name')->nullable(); // Название филиала
			$table->string('person')->nullable(); // Представитель филиала
			$table->string('phone')->nullable(); // Телефон
			$table->string('email')->unique(); // Почта для связи
			$table->string('address')->nullable(); // Адрес филиала
			$table->text('info')->nullable(); // Примечания
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
        Schema::dropIfExists('filials');
    }
}
