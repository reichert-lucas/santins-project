<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UniversityResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(
            User::paginate(8)
        );
    }

    public function universities(Request $request)
    {
        $user = $request->user();
        
        return response()->json(
            UniversityResource::collection($user->universities)
            , 201
        );
    }
}
