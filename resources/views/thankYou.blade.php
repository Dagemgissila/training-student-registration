<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
    @include('sweetalert::alert')
    <div class="content bg-white">
         <div class="row d-flex md-flex-row flex-sm-col-reverse align-items-center justify-content-center">
              <div  class="col-md-6 col-12">
                <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/Age Front.png" class="d-block w-100" alt="Image 1">
                        </div>
                        <div class="carousel-item">
                            <img src="images/Back 3nd.png" class="d-block w-100" alt="Image 2">
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
                <div class="container mx-auto">
                    <h2>Payment Instructions:</h2>
                    <p>
                        Make a payment using one of the accepted methods: bank transfer or cash.<br>
                        Ensure the payment is made before the specified deadline to avoid any late fees.
                    </p>

                    <h2>Fee</h2>
                    <ul>
                        <li><strong>1 Month</strong> 3,500 birr</li>
                        <li><strong>2 Month</strong> 6,000 birr</li>
                        <li><strong>3 Month</strong> 9,000 birr</li>
                        <li><strong>4 Month</strong> 11,00 birr</li>
                    </ul>

                    <h2>Bank Account Information:</h2>
                    <p>
                        Please transfer the tuition fee to the following bank account:
                    </p>
                    <ul>
                        <li><strong>Abysinia Bank:</strong> 161754544</li>
                        <li><strong>Ahadu Bank:</strong> 0023026620301</li>
                        <li><strong>CBE Bank:</strong> Hulenta Technology Development Service</li>
                    </ul>

                    <h2>Confirmation SMS:</h2>
                    <p>SMS has been sent to your registered mobile number with the same information.</p>

                    <h2>Next Steps:</h2>
                    <p>
                        Once your payment is confirmed, you will receive further instructions regarding orientation, class schedules, and any additional requirements.
                    </p>

                    <h2>Contact Information:</h2>
                    <p>
                        If you have any questions or encounter issues during the payment process, please contact our finance office at <strong><a href="mailto:info@softnetsc.com">info@softnetsc.com</a></strong> or <strong><a href="tel:+2511578657">+251 1578657</a>  or <a href="tel:+251951621722">+251-951621722</a></strong>                    </p>

                    <h2>Terms and Conditions:</h2>
                    <p>
                        By completing the payment, you agree to abide by the terms and conditions outlined in our Softnet policies. Please review the <a href="/terms-and-conditions">terms and conditions</a> for more information.
                    </p>

                    <h2>Feedback:</h2>
                    <p>
                        We value your feedback! If you have any comments or suggestions about the registration and payment process, please let us know <a href="https://www.softnetsc.com/#google-map" target="_blank">here</a>.
                    </p>
                </div>

              </div>
         </div>
    </div>

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




