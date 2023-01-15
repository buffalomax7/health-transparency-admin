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
        Schema::create('transparency_provider_versions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transparency_provider_id');
            $table->string('version');
            $table->string('description');
            $table->date('first_seen_date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('transparency_provider_id')->references('id')->on('transparency_providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transparency_provider_versions');
    }
};
