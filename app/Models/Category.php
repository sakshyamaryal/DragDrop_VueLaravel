<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'task_categories';

    protected $fillable = ['name'];

    // Define the relationship to the Task model
    public function tasks()
    {
        return $this->hasMany(Task::class, 'category_id');
    }
}
