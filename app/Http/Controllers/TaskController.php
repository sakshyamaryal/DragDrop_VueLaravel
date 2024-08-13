<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Task;

class TaskController extends Controller
{
    //

    public function index()
    {
        $categories = Category::all()->keyBy('id');

        // Fetch tasks with their associated categories
        $tasks = Task::with('category')->orderBy('category_id')->orderBy('id')->get();

        // Group tasks by category ID
        $tasksGrouped = $tasks->groupBy(function($task) {
            return $task->category->id;
        });

        // Create an array of formatted tasks for each category
        $formattedTasks = $categories->mapWithKeys(function($category) use ($tasksGrouped) {
            // Get tasks for the current category, or an empty collection if none exist
            $tasks = $tasksGrouped->get($category->id, collect([]));

            return [
                $category->name => [ // Use category name as the key
                    'category_id' => $category->id, // Include category_id for reference
                    'category_color' => $category->color, // Include category_id for reference
                    'tasks' => $tasks->map(function($task) {
                        return [
                            'id' => $task->id,
                            'title' => $task->title,
                            'category_id' => $task->category->id
                        ];
                    })
                ]
            ];
        });

        return response()->json($formattedTasks);
    }



    public function postTask(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|integer|exists:task_categories,id'
        ]);

        $task = Category::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id']
        ]);

        return response()->json($task, 201);
    }

    public function addContainers (Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'color' => 'nullable|string',
        ]);

        $task = Category::create([
            'name' => $validated['name'],
            'color' => $validated['color']
        ]);

        return response()->json($task, 201);
    }
    
}
