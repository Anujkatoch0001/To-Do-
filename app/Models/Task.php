<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model


{
   
    protected $fillable = ['title', 'description', 'long_description', 'isCompleted'];

   
    protected static function boot()
    {
        parent::boot();

        // Set default value for isCompleted when creating a task
        static::creating(function ($task) {
            $task->isCompleted = $task->isCompleted ?? false;
        });
    }

     
    
   public function getStatusAttribute()
   {
       return $this->isCompleted ? 'Completed' : 'Pending';
   }
}
