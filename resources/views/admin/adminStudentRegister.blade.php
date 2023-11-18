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
<h2>Student Registration</h2>
<div class="content bg-white">
    <div class="row d-flex md-flex-row flex-sm-col-reverse align-items-center justify-content-center">
         <div class="col-12 ">
           <main class="px-md-3 px-2 py-3">
               @if(session()->has("error"))
                   <div class="bg-danger text-white p-2">
                         {{ session("error") }}
                   </div>
               @endif
               <form action="{{ route("register") }}" method="post">
                   @csrf
                   <fieldset>
                       <legend>Student Info</legend>
                       <div class="row">
                              <!-- First Name -->
                              <div class="col-md-4">
                               <div class="form-group">
                                   <label for="student_fullname" class="d-flex align-items-center">Student Fullname: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="text" class="form-control" value="{{ old('student_fullname') }}" placeholder="Enter First Name" id="student_fullname" name="student_fullname" required>
                               </div>
                               @error("student_fullname")
                                    <span class="text-danger p-1">{{ $message }}</span>
                               @enderror
                           </div>
                           <!-- Age -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="age" class="d-flex align-items-center">Age: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="number" class="form-control" min="8" max="18" value="{{ old('age') }}" placeholder="Enter Age" id="age" name="age" required>
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
                                       <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                       <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
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
                               <input type="text" class="form-control" value="{{ old('schoolName') }}" placeholder="Enter School Name" id="schoolName" name="schoolName" required>
                           </div>
                           @error("schoolName")
                           <span class="text-danger p-1">{{ $message }}</span>
                         @enderror
                       </div>
                           <!-- School Address -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="schoolAddress" class="d-flex align-items-center">School Address: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="text" class="form-control" value="{{ old('schoolAddress') }}" placeholder="Enter School Address" id="schoolAddress" name="schoolAddress" required>
                               </div>
                               @error("schoolAddress")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Grade/Class -->
                           <div class="col-md-4">
                               <div class="form-group">
                                   <label for="gradeClass" class="d-flex align-items-center">Grade/Class: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="number" class="form-control" min="3" max="12" value="{{ old('gradeClass') }}" placeholder="Enter Grade eg.  6, 7, 8 .." id="gradeClass" name="gradeClass" required>
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
                                   <input type="text" class="form-control" value="{{ old('parent_fullname') }}" placeholder="Enter Fullname" id="parent_fullname" name="parent_fullname" required>
                               </div>
                               @error("parent_fullname")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Email -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="email"  class="d-flex align-items-center">Email:  <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                                   <input type="email" class="form-control" value="{{ old('email') }}" placeholder="Enter Email" id="email" name="email" required>
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
                                   <input type="number" class="form-control" value="{{ old('primaryPhoneNumber') }}" placeholder="0922 ..." id="primaryPhoneNumber" name="primaryPhoneNumber" required>
                               </div>
                               @error("primaryPhoneNumber")
                               <span class="text-danger p-1">{{ $message }}</span>
                             @enderror
                           </div>

                           <!-- Secondary Phone Number -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="secondaryPhoneNumber" class="mt-md-4">Secondary Phone Number:</label>
                                   <input type="number" class="form-control" value="{{ old('secondaryPhoneNumber') }}" placeholder="0933 ..." id="secondaryPhoneNumber" name="secondaryPhoneNumber">
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
                                       <option value="morning" {{ old('preferredSession') == 'morning' ? 'selected' : '' }}>Morning</option>
                                       <option value="afternoon" {{ old('preferredSession') == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
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
                                       <option value="Jemo Champions Academy" {{ old("preferredLocation")== "Jemo Champions Academy" ?"selected" :"" }}>Jemo Champions Academy</option>
                                       <option value="Mexico Quense College"  {{ old("preferredLocation")== "Mexico Quense College" ?"selected" :"" }}>Mexico Quense College</option>
                                       <option value="Piassa Softnet Trainning Center" {{ old("preferredLocation")== "Piassa Softnet Trainning Center" ?"selected" :"" }}>Piassa Softnet Trainning Center</option>
                                       <option value="Yohanes  Gage Academy" {{ old("preferredLocation")== "Yohanes  Gage Academy" ?"selected" :"" }}>Yohanes  Gage Academy</option>
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
                                   <select class="form-control" id="type_of_trainning" name="type_of_trainning" required>
                                       <option value="" disabled selected>Select Age Group</option>
                                       <option value="Age(10-14)" {{ old('type_of_trainning') == 'Age(10-14)' ? 'selected' : '' }}> Ages (10 - 14) Igniting the Tech Spark</option>
                                       <option value="Age(15-17)'" {{ old('type_of_trainning') == 'Age(15-17)' ? 'selected' : '' }}>Ages (15 -17 ) Shaping Your Tech Future</option>
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
                                <select class="form-control" id="is_scholarship" name="is_scholarship" required>
                                    <option value="" disabled selected>Select </option>
                                    <option value="0">Paying Student</option>
                                    <option value="1">Scholarship Student</option>
                                </select>
                            </div>
                            @error("is_scholarship")
                            <span class="text-danger p-1">{{ $message }}</span>
                          @enderror
                        </div>

                       </div>

                       <legend>Training Source</legend>
                       <div class="row">
                           <!-- Radio buttons for training source -->
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label>Where did you hear about the training?</label>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="facebook" value="facebook" {{ old('training_source') == 'facebook' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="facebook">Facebook</label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="telegram" value="telegram" {{ old('training_source') == 'telegram' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="telegram">Telegram</label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="website" value="website" {{ old('training_source') == 'website' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="website">Website</label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="instagram" value="instagram" {{ old('training_source') == 'instagram' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="instagram">Instagram</label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="school" value="school" {{ old('training_source') == 'school' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="school">School</label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="banner" value="banner" {{ old('training_source') == 'banner' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="banner">Banner</label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="training_source" id="other_radio" value="other" {{ old('training_source') == 'other' ? 'checked' : '' }}>
                                       <label class="form-check-label" for="other_radio">Other</label>
                                   </div>
                               </div>
                           </div>
                       </div>


                   </fieldset>

                   <button id="registerButton" class="btn text-white font-weight-bold" style="background-color: #9933ff;">Register</button>
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
