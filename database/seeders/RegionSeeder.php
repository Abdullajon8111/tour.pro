<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            $sql = file_get_contents(__DIR__.'/sql/regions.sql');
            DB::insert($sql);
        } catch (\Exception $exception) {
            $this->command->error($exception->getMessage());
            DB::rollBack();
        }

        DB::commit();
    }
}
