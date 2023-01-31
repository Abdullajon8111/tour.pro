<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_agents', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('photo')->nullable();
            $table->json('description')->nullable();
            $table->string('phone');
            $table->string('phone2')->nullable();

            $table->foreignId('region_id')->nullable();

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
        Schema::dropIfExists('tour_agents');
    }
}
