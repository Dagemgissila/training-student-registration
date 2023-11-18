<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use Carbon\Carbon;

class DashboaordController extends Controller
{
    public function index(){
        $totalStudent=StudentProfile::count();
        $scholarShipStudent=StudentProfile::query()->where("is_scholarship",1)->count();
        $todayRegistration = StudentProfile::query()->whereDate("created_at", Carbon::today())->count();
        $approvedStudent=StudentProfile::query()->where("status",1)->count();
        return view("admin.dashboard",compact("totalStudent","scholarShipStudent","todayRegistration","approvedStudent"));
    }
}
