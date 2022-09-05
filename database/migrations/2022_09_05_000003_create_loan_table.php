<?php

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
        Schema::create('loan_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');            
            $table->string('type',50);            /* Personal or Cooperate */
            $table->float('min_interest',8,2);      /* Percentage Range */
            $table->float('max_interest',8,2);      /* Percentage Range */
            $table->integer('min_tenure');        /* Tenure range in months. */
            $table->integer('max_tenure');        /* Tenure range in months. */
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
        Schema::dropIfExists('loan_types');
    }
};
