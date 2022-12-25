<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRequest;
use App\Http\Resources\ClassResource;
use App\Models\Classes;


class ClassController extends Controller
{
    public function store(StoreClassRequest $request)
    {
        $data = $request->all();
        $class = Classes::create($data);

        return new ClassResource($class);
    }
}
