<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;
class RegisterController extends Controller
{
    public function index(){
        return view("auth.register");
    }

    public function store(Request $request){


        $request->validate([
            "student_fullname" => "required|max:30",
            'age' => 'required|numeric|min:8|max:18',
            "gender" => "required",
            "schoolName" => "required|max:40",
            "schoolAddress" => "required|max:40",
            "gradeClass" => "required|numeric",
            "parent_fullname" => "required|max:30",
            "email" => "nullable|email",
            "primaryPhoneNumber" => "required|numeric|digits:10",
            "secondaryPhoneNumber" => "nullable|numeric|digits:10",
            "preferredSession" => "required",
            "preferredLocation" => "required",

        ]);


        $studentProfile = new StudentProfile();
        // Assign values from the validated request data
        $studentProfile->fullname = $request->input("student_fullname");
        $studentProfile->age = $request->input("age");
        $studentProfile->gender = $request->input("gender");
        $studentProfile->school_name = $request->input("schoolName");
        $studentProfile->school_address = $request->input("schoolAddress");
        $studentProfile->grade = $request->input("gradeClass");
        $studentProfile->parent_fullname = $request->input("parent_fullname");
        $studentProfile->email = $request->input("email");
        $studentProfile->primary_phone = $request->input("primaryPhoneNumber");
        $studentProfile->secondary_phone = $request->input("secondaryPhoneNumber");
        $studentProfile->prefered_session = $request->input("preferredSession");
        $studentProfile->prefered_location = $request->input("preferredLocation");
        if($request->is_scholarship){
            $studentProfile->is_scholarship = $request->input("is_scholarship");
            $studentProfile->status=$request->input("is_scholarship");
        }
        $studentProfile->type_of_training = $request->input("type_of_trainning");
        $studentProfile->training_source = $request->input("training_source");
        $studentProfile->save();



        if(auth()->user()){
            alert()->success('Register','student Register Succesfully');
            return redirect()->route("student");
        }

        else{
            alert()->success('Registration Successful!','Congratulations! You have successfully registered for the upcoming semester. To complete your registration, please follow the instructions below:');
            return redirect()->route("complete-registration");
        }



    }


    public function registerForm(){
        return view("admin.adminStudentRegister");
    }

    public function viewDeatil($id){
        $student=StudentProfile::find($id);
        if($student){
          return view("admin.ViewDetail",compact("student"));
        }

        abort(404);
    }


    public function updateProfile(Request $request,$id){
        $request->validate([
            "student_fullname" => "required|max:30",
            'age' => 'required|numeric|min:8|max:18',
            "gender" => "required",
            "schoolName" => "required|max:40",
            "schoolAddress" => "required|max:40",
            "gradeClass" => "required|numeric",
            "parent_fullname" => "required|max:30",
            "email" => "nullable|email",
            "primaryPhoneNumber" => "required|numeric|digits:10",
            "secondaryPhoneNumber" => "nullable|numeric|digits:10",
            "preferredSession" => "required",
            "preferredLocation" => "required",
            "type_of_training"=>"required",
            "is_scholarship"=>"nullable"
        ]);


        $student=StudentProfile::find($id);


        if ($student->payment()->count() > 0) {
            $status = 1;
        }
        else{
            $status=0;
        }

        $scholarship=$student->is_scholarship;

        $x=$request->is_scholarship;

          if($x == 1){
            $status = 1 ;
            $scholarship=1;
          }
          if($x==0)
          {
            $status = $status;
            $scholarship=0;
          }





        StudentProfile::whereId($id)->update([
             "fullname"=>$request->student_fullname,
             "age"=>$request->age,
             "gender"=>$request->gender,
             "school_name"=>$request->schoolName,
             "school_address"=>$request->schoolAddress,
             "grade"=>$request->gradeClass,
             "parent_fullname"=>$request->parent_fullname,
             "email"=>$request->email,
             "type_of_training"=>$request->type_of_training,
             "primary_phone"=>$request->primaryPhoneNumber,
             "secondary_phone"=>$request->secondaryPhoneNumber,
             "prefered_location"=>$request->preferredLocation,
             "prefered_session"=>$request->preferredSession,
             "is_scholarship"=> $scholarship,
             "status"=>$status
        ]);
        alert()->success('Update','student Profile Update Succesfully');
        return redirect()->route("student");
    }
}
