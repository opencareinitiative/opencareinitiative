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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default('1');
            $table->foreignId('contact_person')->references('id')->on('users')->constrained();
            $table->foreignId('vacancy_location')->references('id')->on('locations')->constrained();
            $table->foreignId('job_title')->references('id')->on('job_titles')->constrained();
            $table->string('external_code')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('available_vacancies')->default('1');
            $table->boolean('apply_online')->default('1');
            $table->timestamp('opening_date')->nullable();
            $table->timestamp('closing_date')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('vacancies');
    }
};
