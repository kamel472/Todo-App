<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Spatie\Searchable\Search;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    
    public function show(User $user)
    {
       
        return response([

            'data'=> new UserResource($user)
        ]);
    }
    
}
