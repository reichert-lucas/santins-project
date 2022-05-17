<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversityIndexRequest;
use App\Http\Resources\UniversityResource;
use App\Http\Resources\UserResource;
use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function index(UniversityIndexRequest $request)
    {
        $universities = (new University())->search($request->search)
                                            ->orderBy('name')
                                            ->paginate(8);

        return UniversityResource::collection($universities);
    }

    public function subscribeUser(Request $request, University $university)
    {
        $user = $request->user();

        $university->users()->save($user);
        
        return response()->json([
            'user' => new UserResource($user),
            'universities' => UniversityResource::collection($user->universities)
        ], 201);
        
        return response()->json([
            'message' => 'unexpected error'
        ], 500);
    }
    
    public function unsubscribeUser(Request $request, University $university)
    {
        $user = $request->user();

        if ($university->users()->detach($user)) {
            return response()->json(null, 204);
        }

        return response()->json([
            'message' => 'unexpected error'
        ], 500);
    }
}
