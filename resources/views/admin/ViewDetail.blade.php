@extends("layouts.app")
<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    legend {
        background-color: #9933ff;
        color: #fff;
        padding: 3px 6px;
        margin: 13px 0;
    }
    #conten{

    }
    form .row {
        padding: 10px;
    }
    /* Adjusting styles for the input fields */
    form input.form-control,
    form select.form-control,
    form  .form-check-input {
        border-color: #9933ff;
        margin-bottom: 10px;
    }

</style>
@section("content")
<h2>View Detail</h2>
<div class="content bg-white">
    <div class="row d-flex md-flex-row flex-sm-col-reverse align-items-center justify-content-center">
         <div class="col-12 ">
           <main class="px-md-3 px-2 py-3">
               <form action="{{ route("updateStudentProfile",$student->id) }}" method="post">
                   @csrf
                   <fieldset>
                       <legend>Student Info</legend>
                       <div class="row">
                              <!-- First Name -->
                              <div class="col-md-4">
                               <div class="form-group">
                                   <label for="student_fullname" class="d-flex align-items-center">Student Fullname: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="text" class="form-control" value="{{ $student->fullname }}" placeholder="Enter First Name" id="student_fullname" name="student_fullname" required>
                               </div>
                               @error("student_fullname")
                                    <span class="text-danger p-1">{{ $message }}</span>
                               @enderror
                           </div>
                           <!-- Age -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="age" class="d-flex align-items-center">Age: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="number" class="form-control" min="8" max="18" value="{{ $student->age }}" placeholder="Enter Age" id="age" name="age" required>
                               </div>
                               <span id="ageValidationMessage" class="text-danger"></span>
                               @error("age")
                                 <span class="text-danger p-1">{{ $message }}</span>
                               @enderror
                           </div>

                           <!-- Gender -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="gender" class="d-flex align-items-center">Gender: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <select class="form-control" id="gender" name="gender" required>
                                       <option value="" disabled selected>Select gender</option>
                                       <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                                       <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                                   </select>
                               </div>
                               @error("gender")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>


                       </div>

                       <div class="row">
                       <!-- School Name -->
                       <div class="col-md-4">
                           <div class="form-group">
                               <label for="schoolName" class="d-flex align-items-center">School Name: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                               <input type="text" class="form-control" value="{{ $student->school_name }}" placeholder="Enter School Name" id="schoolName" name="schoolName" required>
                           </div>
                           @error("schoolName")
                           <span class="text-danger p-1">{{ $message }}</span>
                         @enderror
                       </div>
                           <!-- School Address -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="schoolAddress" class="d-flex align-items-center">School Address: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="text" class="form-control" value="{{ $student->school_address}}" placeholder="Enter School Address" id="schoolAddress" name="schoolAddress" required>
                               </div>
                               @error("schoolAddress")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Grade/Class -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="gradeClass" class="d-flex align-items-center">Grade/Class: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="number" class="form-control" min="3" max="12" value="{{ $student->grade }}" placeholder="Enter Grade eg.  6, 7, 8 .." id="gradeClass" name="gradeClass" required>
                               </div>
                               <span id="gradeClassValidationMessage" class="text-danger"></span>
                               @error("gradeClass")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>
                       </div>

                       <legend>Parent Info</legend>
                       <div class="row">
                           <!-- Full Name -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="parent_fullname" class="d-flex align-items-center">Full Name: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="text" class="form-control" value="{{ $student->parent_fullname }}" placeholder="Enter Fullname" id="parent_fullname" name="parent_fullname" required>
                               </div>
                               @error("parent_fullname")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Email -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="email"  class="d-flex align-items-center">Email:  <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="email" class="form-control" value="{{ $student->email }}" placeholder="Enter Email" id="email" name="email" required>
                               </div>
                               <span id="emailValidationMessage" class="text-danger"></span>
                               @error("email")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                       </div>

                       <div class="row">
                           <!-- Primary Phone Number -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="primaryPhoneNumber"  class="d-flex align-items-center">Primary Phone Number: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="number" class="form-control" value="{{ $student->primary_phone }}" placeholder="0922 ..." id="primaryPhoneNumber" name="primaryPhoneNumber" required>
                               </div>
                               @error("primaryPhoneNumber")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Secondary Phone Number -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="secondaryPhoneNumber" class="mt-md-4">Secondary Phone Number:</label>
                                   <input type="number" class="form-control" value="{{ $student->secondary_phone }}" placeholder="0933 ..." id="secondaryPhoneNumber" name="secondaryPhoneNumber">
                               </div>
                               @error("secondaryPhoneNumber")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>
                       </div>

                       <legend>Training</legend>
                       <div class="row">
                           <!-- Preferred Time -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="preferredSession" class="d-flex align-items-center">Preferred Session: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <select class="form-control" id="preferredSession" name="preferredSession" required>
                                       <option value="" disabled selected>Select preferred Session</option>
                                       <option value="morning" {{ $student->prefered_session == 'morning' ? 'selected' : '' }}>Morning</option>
                                       <option value="afternoon" {{ $student->prefered_session == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                                       <!-- Add more time range options as needed -->
                                   </select>
                               </div>
                               @error("preferredSession")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Preferred Location -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="preferredLocation" class="d-flex align-items-center">Preferred Location: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <select class="form-control" id="preferredLocation" name="preferredLocation" required>
                                       <option value="" disabled selected>Select preferred location</option>
                                       <option value="Jemo Champions Academy" {{$student->prefered_location== "Jemo Champions Academy" ?"selected" :"" }}>Jemo Champions Academy</option>
                                       <option value="Mexico Quense College"  {{ $student->prefered_location== "Mexico Quense College" ?"selected" :"" }}>Mexico Quense College</option>
                                       <option value="Piassa Softnet Trainning Center" {{ $student->prefered_location== "Piassa Softnet Trainning Center" ?"selected" :"" }}>Piassa Softnet Trainning Center</option>
                                       <option value="Yohanes  Gage Academy" {{ $student->prefered_location== "Yohanes  Gage Academy" ?"selected" :"" }}>Yohanes  Gage Academy</option>
                                       <!-- Add more location options as needed -->
                                   </select>
                               </div>
                               @error("preferredLocation")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="type_of_trainning" class="d-flex align-items-center">Age Group<span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <select class="form-control" id="type_of_trainning" name="type_of_training" required>
                                       <option value="" disabled selected>Select Age Group</option>
                                       <option value="Age(10-14)" {{ $student->type_of_training == 'Age(10-14)' ? 'selected' : '' }}> Ages (10 - 14) Igniting the Tech Spark</option>
                                       <option value="Age(15-17)" {{ $student->type_of_training == 'Age(15-17)' ? 'selected' : '' }}>Ages (15 -17 ) Shaping Your Tech Future</option>
                                       <!-- Add more time range options as needed -->
                                   </select>
                               </div>
                               @error("type_of_trainning")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <div class="col-md-4">
                            <div class="form-group">
                                <label for="is_scholarship" class="d-flex align-items-center">Student Type:<span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                <select class="form-control" id="is_scholarship" name="is_scholarship" {{ $student->payment->count() > 0 ? "disabled" : ""}}  required>
                                    <option value="" disabled selected>Select </option>
                                    <option value="0" {{ $student->is_scholarship == "0"  ? "selected" :"" }}>Paying Student</option>
                                    <option value="1" {{ $student->is_scholarship == "1" ? "selected" : "" }}>Scholarship Student</option>
                                </select>
                            </div>
                            @error("is_scholarship")
                            <span class="text-danger p-1">{{ $message }}</span>
                          @enderror
                        </div>

                       </div>

                   </fieldset>

                   <button id="registerButton" class="btn text-white font-weight-bold" style="background-color: #9933ff;">Update</button>
               </form>
           </main>

         </div>
    </div>
</div>
<script>
    document.getElementById('email').addEventListener('change', function () {
        validateEmail();
    });

    function validateEmail() {
        var emailInput = document.getElementById('email');
        var emailValidationMessage = document.getElementById('emailValidationMessage');
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailRegex.test(emailInput.value)) {
            emailValidationMessage.textContent = 'Invalid email format';
        } else {
            emailValidationMessage.textContent = '';
        }
    }

    document.getElementById('age').addEventListener('change', function () {
    validateAge();
});

function validateAge() {
    var ageInput = document.getElementById('age');
    var ageValidationMessage = document.getElementById('ageValidationMessage');

    if (isNaN(ageInput.value) || ageInput.value < 8 || ageInput.value > 18) {
        ageValidationMessage.textContent = 'Age must be between 8 and 18';
    } else {
        ageValidationMessage.textContent = '';
    }
}

document.getElementById('gradeClass').addEventListener('change', function () {
    validateGradeClass();
});

function validateGradeClass() {
    var gradeClassInput = document.getElementById('gradeClass');
    var gradeClassValidationMessage = document.getElementById('gradeClassValidationMessage');

    if (isNaN(gradeClassInput.value) || gradeClassInput.value < 3 || gradeClassInput.value > 12) {
        gradeClassValidationMessage.textContent = 'Grade/Class must be between 3 and 12';
    } else {
        gradeClassValidationMessage.textContent = '';
    }
}

document.getElementById('agreeToTerms').addEventListener('change', function () {
    validateAgreeToTerms();
});




</script>
@endsection
