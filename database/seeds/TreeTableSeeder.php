<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tree')->insert(
            [
                ['id' => 1, 'name' => 'Languages', 'parent_id' => null],
                ['id' => 2, 'name' => 'Indo-European', 'parent_id' => 1],
                ['id' => 3, 'name' => 'European', 'parent_id' => 2],
                ['id' => 4, 'name' => 'Baltic', 'parent_id' => 3],
                ['id' => 5, 'name' => 'Lithuanian', 'parent_id' => 4],
                ['id' => 6, 'name' => 'Latvian', 'parent_id' => 4],
                ['id' => 7, 'name' => 'Slavic', 'parent_id' => 3],
                ['id' => 8, 'name' => 'Russian', 'parent_id' => 7],
                ['id' => 9, 'name' => 'Uralic', 'parent_id' => null],
            ],
            );
    }
}
