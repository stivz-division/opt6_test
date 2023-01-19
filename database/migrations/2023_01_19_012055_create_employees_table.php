<?php

use App\Models\Company;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->comment('Имя сотрудника');

            $table->foreignIdFor(Company::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate()
                ->comment('Компания к которой относится сотрудник');

            $table->string('email')
                ->unique()
                ->nullable()
                ->comment('E-Mail сотрудника');

            $table->string('phone')
                ->unique()
                ->nullable()
                ->comment('Номер телефона сотрудника');


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
        Schema::dropIfExists('employees');
    }
};
