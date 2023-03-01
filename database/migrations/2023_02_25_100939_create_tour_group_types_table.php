<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTourGroupTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_group_types', function (Blueprint $table) {
            $table->id();

            $table->json('name');

            $table->timestamps();
            $table->softDeletes();
        });

        \App\Models\TourGroupType::create(['name' => 'Группавой']);
        \App\Models\TourGroupType::create(['name' => 'Семейный']);
        \App\Models\TourGroupType::create(['name' => 'Одиночный']);

        Schema::table('tours', function (Blueprint $table) {
            $table->foreignId('group_type')->nullable()->index();
            $table->integer('group_people_number')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_group_types');

        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('group_type');
            $table->dropColumn('group_people_number');
        });
    }
}
