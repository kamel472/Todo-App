<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class File extends Model
{
    protected $fillable = [
        'name', 'task_id' , 'uploaded_at'
    ];

    public function task()
    {
        return $this->belongsTo(TAsk::class);
    }
}
