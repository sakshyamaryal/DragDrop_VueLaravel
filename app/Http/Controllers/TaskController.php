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
        
        $tasks = Task::with('category')->get()->groupBy(function($task) {
            return $task->category->name;
        });

        $formattedTasks = $tasks->map(function($taskGroup, $categoryName) {
            return [
                'category_id' => $taskGroup->first()->category->id, 
                'tasks' => $taskGroup->map(function($task) {
                    return [
                        'id' => $task->id,
                        'title' => $task->title,
                        'category_id' => $task->category->id
                    ];
                })
            ];
        });

        return response()->json($formattedTasks);
    
    }

    public function postTask(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:task_categories,id'
        ]);

        $task = Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id']
        ]);

        return response()->json($task, 201);
    }
    
}
