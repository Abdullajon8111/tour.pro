<?php

namespace Database\Seeders;

use App\Models\AdType;
use Illuminate\Database\Seeder;

class AdTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new AdType();
        $model->name = 'day3';
        $model->label = 'Размещение в ТОП в течение 3 дней';
        $model->lifetime = 3;
        $model->amount = 100000;
        $model->save();

        $model = new AdType();
        $model->name = 'day7';
        $model->label = 'Размещение в ТОП в течение 7 дней';
        $model->lifetime = 7;
        $model->amount = 100000;
        $model->save();

        $model = new AdType();
        $model->name = 'day30';
        $model->label = 'Размещение в ТОП в течение 30 дней';
        $model->lifetime = 30;
        $model->amount = 100000;
        $model->save();
    }
}
