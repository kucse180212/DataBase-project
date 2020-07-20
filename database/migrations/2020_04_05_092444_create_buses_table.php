<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\ForeignKeyDefinition;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {

$table->integer('id')->autoIncrement();
$table->integer('company_id');
$table->string('starting_Place');
$table->date('starting_Date');
$table->time('starting_time');
$table->string('Destination');
$table->integer('total_seat');
$table->integer('available_seat');
$table->timestamps();
$table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buses');
    }
}
