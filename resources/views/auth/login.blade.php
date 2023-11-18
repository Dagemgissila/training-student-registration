<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Login Page</title>
    <style>
        body {
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-form {
            max-width: 500px; /* Set your preferred max-width */
            width: 100%;
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

    <div class="container d-flex align-items-center justify-content-center">

            <div class="card-body login-form">
                <div class="card card-body p-5">
                    <h3 class="card-title text-center" style="color: #9933ff;">Soft net</h3>
                    <h3 class="card-title mt-2 mb-2">Login</h3>
                     @if(session()->has("error"))
                          <div class="bg-danger p-2 text-white text-center my-2">
                                {{ session("error") }}
                          </div>
                     @endif
                    <form action="{{ route("login") }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="enter email address" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div>
                            @error("email")
                                <p class="text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter Your Password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div>
                            @error("password")
                                <p class="text-danger ">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn font-weight-bold" style="background-color: #9933ff;color: wheat;">Login</button>
                    </form>
                </div>
            </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>


