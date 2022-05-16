<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UniversityIndexRequest;
use App\Http\Resources\UniversityResource;
use App\Models\University;

class UniversityController extends Controller
{
    public function index(UniversityIndexRequest $request)
    {
        $universities = (new University())->search($request->search)
                                            ->orderBy('name')
                                            ->paginate(8);

        return UniversityResource::collection($universities);
    }

    
}
