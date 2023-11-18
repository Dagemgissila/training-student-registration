<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Student Registration Page</title>
      <style>
        body{
            background-color: #9933ff;
            overflow-x: hidde
        }
        .content{
            min-height: 100vh;
        }
        form input.form-control,
        form select.form-control,
        form  .form-check-input {
            border-color: #9933ff;
            margin-bottom: 10px;
        }

      </style>
</head>
<body>

    <div class="content bg-white">
         <div class="row d-flex md-flex-row flex-sm-col-reverse align-items-center justify-content-center">
              <div  class="col-md-6 col-12">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset ('images/Age Front.png') }}" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset ('images/Back 3nd.png') }}" class="d-block w-100" alt="Image 2">
                        </div>
                        <!-- Add more carousel items with additional images as needed -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
              </div>

              <div class="col-md-6 col-12 ">
                <main class="px-md-5 px-4 py-3">
                    <h2>Registration Page</h2>
                    @if(session()->has("error"))
                        <div class="bg-danger text-white p-2">
                              {{ session("error") }}
                        </div>
                    @endif
                    <form action="{{ route("register") }}" method="post" onsubmit="return validateAgreeToTerms()">
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
                        <div class="row">
                            <!-- Checkbox for agreeing to terms and policies -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-check d-flex align-items-center">
                                        <input class="form-check-input" type="checkbox" id="agreeToTerms" class="mt-2" name="agreeToTerms">

                                        <a type="button" class="btn m-0 text-primary" data-toggle="modal" data-target="#exampleModal">
                                            I agree to the terms and conditions
                                        </a>
                                    </div>
                                </div>
                                <span id="agreeToTermsValidationMessage" class="text-danger"></span>
                            </div>
                        </div>

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



    function validateAgreeToTerms() {
        var agreeToTermsCheckbox = document.getElementById('agreeToTerms');
        var agreeToTermsValidationMessage = document.getElementById('agreeToTermsValidationMessage');

        if (!agreeToTermsCheckbox.checked) {
            agreeToTermsValidationMessage.textContent = 'You must agree to our terms and policies. Please read it and check the box to register';
            return false;
        } else {
            agreeToTermsValidationMessage.textContent = '';
            return true;
        }
    }

    </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Softnet Solutions Technology Training Program - Terms and Conditions</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">


            <ul>
                <li>
                    <h2>Enrollment and Registration:</h2>
                    <ul>
                        <li>Enrollment is open to students aged 10-14 and 15-17.</li>
                        <li>Parents or legal guardians must complete the registration process for their child.</li>
                    </ul>
                </li>

                <li>
                    <h2>Schedule and Duration:</h2>
                    <ul>
                        <li>The training sessions will be conducted every Saturday.</li>
                        <li>Each session will last for 2 hours.</li>
                        <li>Softnet Solutions reserves the right to modify the schedule with prior notice.</li>
                    </ul>
                </li>

                <li>
                    <h2>Attendance:</h2>
                    <ul>
                        <li>Regular attendance is crucial for the student's progress.</li>
                        <li>Parents are responsible for ensuring their child's punctuality.</li>
                    </ul>
                </li>

                <li>
                    <h2>Code of Conduct:</h2>
                    <ul>
                        <li>Students are expected to behave respectfully towards instructors and fellow participants.</li>
                        <li>Any disruptive behavior may result in the student being asked to leave the program.</li>
                        <li>In the event of persistent disruptive behavior that is not resolved or is repeated, Softnet Solutions reserves the right to terminate the student's enrollment in the program.</li>
                    </ul>
                </li>

                <li>
                    <h2>Parental Involvement:</h2>
                    <ul>
                        <li>Parents are encouraged to actively engage in their child's learning experience.</li>
                        <li>Regular updates and feedback will be provided to parents regarding their child's progress.</li>
                    </ul>
                </li>
                <li>
                    <h2>Fees and Payments:</h2>
                    <ul>
                        <li>Tuition fees must be paid in full before the start of the training program.</li>
                        <li>Refunds will not be issued after the program has commenced.</li>
                    </ul>
                </li>

                <li>
                    <h2>Cancellation Policy:</h2>
                    <ul>
                        <li>Softnet Solutions reserves the right to cancel sessions due to unforeseen circumstances.</li>
                        <li>In the event of cancellation, efforts will be made to reschedule the session.</li>
                    </ul>
                </li>

                <li>
                    <h2>Liability:</h2>
                    <ul>
                        <li>Softnet is not responsible for the loss, theft, or damage of personal belongings brought by students to the training sessions.</li>
                        <li>Parents or legal guardians are responsible for providing accurate and up-to-date medical information about their child. Softnet will rely on this information in case of medical emergencies.</li>
                        <li>In the event of an emergency, Softnet will take reasonable steps to ensure the safety and well-being of the students. However, Softnet is not liable for any delays or inability to respond in emergency situations beyond its control.</li>
                        <li>Parents are financially liable for any damages caused by their child to the lab equipment, facilities, or any property of Softnet during the training program.</li>
                    </ul>
                </li>
                <li>
                    <h2>Photography and Publicity:</h2>
                    <ul>
                        <li>Softnet Solutions may use photographs or videos of the training sessions for promotional purposes.</li>
                        <li>Parents who do not wish their child to be photographed or featured in promotional material must inform Softnet Solutions in writing.</li>
                    </ul>
                </li>

                <li>
                    <h2>Confidentiality:</h2>
                    <ul>
                        <li>Any proprietary information shared during the training sessions must be kept confidential.</li>
                    </ul>
                </li>

                <li>
                    <h2>Agreement:</h2>
                    <ul>
                        <li>By enrolling their child, parents acknowledge that they have read, understood, and agreed to abide by these terms and conditions.</li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    {{-- <script>
        // Use JavaScript to make the carousel slide automatically
        var myCarousel = document.getElementById('imageCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 5000 // Set the interval (in milliseconds), e.g., 2000 for 2 seconds
        });
    </script> --}}

</body>
</html>
