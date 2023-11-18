<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;

class StudentController extends Controller
{
    public function index(){
        $students=StudentProfile::query()->orderBy("created_at","desc")->get();
        return view("admin.students",compact("students"));
    }
}
