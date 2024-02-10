<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
    ];

    // i'm from todo services of facade
    public function updateUser($data, $id){
        $task=$this->where('id', $id)->first();
        $task->update($data);
        return $task;
    }
}
