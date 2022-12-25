<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Students;

class StudentController extends Controller
{
    public function store(StoreStudentRequest $request)
    {
        $data = $request->all();
        $student = Students::create($data);

        return new StudentResource($student);
    }
}
