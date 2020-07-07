<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\File;

class Task extends Model
{
    protected $fillable = [
        'name', 'user_id' , 'status','visibility','dead_line'
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
