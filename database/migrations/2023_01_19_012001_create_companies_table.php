<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->unique()
                ->comment('Название компании');

            $table->string('email')
                ->unique()
                ->nullable()
                ->comment('E-Mail компании');

            $table->string('logo')
                ->nullable()
                ->comment('Логотип компании');

            $table->string('address')
                ->nullable()
                ->comment('Адрес комании');

            $table->string('coordinates')
                ->nullable()
                ->comment('Координаты местонахождения организации');

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
};
