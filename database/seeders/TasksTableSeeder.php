<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task; 
use App\Models\Category;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = Category::all();
        
        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please create categories first.');
            return;
        }

        // Create 100 fake tasks
        Task::factory()->count(100)->create();
        
    }
}
