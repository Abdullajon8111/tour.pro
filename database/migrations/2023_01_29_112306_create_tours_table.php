<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();

            $table->json('name');

            $table->json('description')->nullable();
            $table->json('about')->nullable();

            $table->string('banner_image')->nullable();
            $table->json('duration')->nullable();
            $table->json('age_limit')->nullable();
            $table->string('country_code', 2)->nullable()->index();
            $table->integer('time_type')->nullable();
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();

            $table->json('program')->nullable();
            $table->json('hotels')->nullable();

            $table->json('price_description')->nullable();
            $table->unsignedBigInteger('price_one')->nullable();
            $table->unsignedBigInteger('price_two')->nullable();
            $table->unsignedBigInteger('price_family')->nullable();

            $table->json('images')->nullable();
            $table->foreignId('region_id')->nullable()->index();
            $table->foreignId('user_id')->nullable()->index();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tours');
    }
}
