<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\User;

class FirstController extends Controller
{
    function index(Request $request) {
        $params = $request->all();
        $query = User::query();
        foreach ($params as $key => $param) {
            if($key != "pagination" && $key != "page"){
                $query = $query->where($key, $param);
            }
        }
        $result = $query->paginate($request->pagination);
        return UserResource::collection($result);
    }
}
