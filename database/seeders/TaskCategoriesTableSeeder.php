<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('task_categories')->insert([
            ['name' => 'Backlog', 'color' => 'red'],
            // ['name' => 'Up Next'],
            // ['name' => 'In Progress'],
            // ['name' => 'Completed'],
        ]);
    }
}
