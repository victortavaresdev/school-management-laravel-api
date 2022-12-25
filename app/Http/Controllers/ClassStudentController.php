<?php

namespace App\Http\Controllers;

use App\Models\Classes;

class ClassStudentController extends Controller
{
    public function index(Classes $class)
    {
        $students = $class->students();
        return response()->json(['data' => $students], 200);
    }
}
