<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;

class FirstController extends Controller
{
    function index(Request $request) {
        var_dump($request->all());
        return UserResource::collection(User::paginate(20));
    }

}
