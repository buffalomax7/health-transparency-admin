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
        Schema::create('mappers', function (Blueprint $table) {
            $table->id();
            $table->string('value'); // EX: 90061 (CPT)
            $table->unsignedBigInteger('mapperable_id'); // EX: ID of 90061 in CPT Table
            $table->string('mapperable_type'); // EX: cpt, drg, payer_plan
            $table->unsignedBigInteger('hospital_id');
            $table->timestamps();

            $table->foreign('hospital_id')->references('id')->on('hospitals');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mappers');
    }
};
