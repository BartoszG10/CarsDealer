<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\FuelTypes;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('model')->nullable();
            $table->enum('fuelType', FuelTypes::TYPES)->nullable();
            $table->year('yearOfProduction')->nullable();
            $table->text('transmission')->nullable();
            $table->text('driveType')->nullable();
            $table->text('addInfo')->nullable();
            $table->unsignedFloat('price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}