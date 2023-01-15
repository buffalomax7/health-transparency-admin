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
        Schema::create('hospitals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hospital_system_id')->nullable();
            $table->unsignedBigInteger('transparency_provider_version_id')->nullable();
            $table->timestamp('last_crawled')->nullable();
            $table->string('crawl_status')->default('not-crawled');
            $table->string('name');
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->unsignedInteger('number_of_beds')->nullable();
            $table->unsignedBigInteger('gross_revenue')->nullable();
            $table->string('trauma_designation')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hospital_system_id')->references('id')->on('hospital_systems');
            $table->foreign('transparency_provider_version_id')->references('id')->on('transparency_provider_versions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
};
