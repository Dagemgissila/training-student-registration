<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <title>Admin Page</title>
    <style>

        #side_nav{
    background-color: blueviolet;
    min-width: 250px;
    max-width: 250px;
    transition: all 0.2s;
}
.content{
    min-height: 100vh;
    width:100%;
}
.h-color{
    background-color: #ffffff;
}
.sidebar li.active{
    background-color: #ffffff;
    color: black;
    border-radius: 8px;
}
.sidebar li.active a, .sidebar li.active a:hover{
    color: black;
}
.sidebar li a{
    color: white;
}
@media(max-width: 767px) {
    #side_nav{
        margin-left: -250px;
        position: fixed;
        min-height: 100vh;
        z-index: 1;
    }
    #side_nav.active{
        margin-left: 0;
    }
}
    </style>
</head>
<body>
    <div class="main-container d-flex">
        @include('sweetalert::alert')
@include("layouts.sidebar");
        <div class="content m-3">
@include("layouts.topnav");
            <main>
                <div class="card m-2">
                     <div class="card-body">
                        @yield("content")
                     </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/1cdf57dc4a.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
   <script>
      $(document).ready(function(){
        $("#students").DataTable();
      })
   </script>
    <script>
        $(document).ready(function() {
            $(".sidebar ul li").on('click', function() {
                $(".sidebar ul li.active").removeClass('active');
                $(this).addClass('active');
            });

            $('.open-btn').on('click', function() {
                $('.sidebar').addClass('active');
            });
            $('.close-btn').on('click', function() {
                $('.sidebar').removeClass('active');
            });
        });
    </script>
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>
