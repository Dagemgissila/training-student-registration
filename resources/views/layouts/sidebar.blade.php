<div class="sidebar" id="side_nav">
            <div class="header-box  px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4 text-white text-center">Admin Panel</h1>
                <button class="btn close-btn d-md-none d-block px-1 py-0 text-white"><i class="fa-solid fa-x"></i></button>
            </div>
            <ul class="list-unstyled px-2">
                <li ><a href="{{ route("dashboard") }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-house px-2"></i>Dashboard</a></li>
                <li><a href="{{ route("student") }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-school px-2"></i>View Student</a></li>
                <li><a href="{{ route("adminStudentRe") }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-registered px-2"></i>Registration Page</a></li>
                <li><a href="{{ route("allPaymentHistory") }}" class="text-decoration-none px-3 py-2 d-block"><i class="fa-solid fa-money-bill-1 px-2"></i>Payment History</a></li>
                <hr class="h-color mx-3">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="#" class="text-decoration-none px-3 py-2 d-block font-weight-bold" onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fa-solid fa-right-from-bracket px-2"></i>Logout
                        </a>
                    </form>
                </li>
            </ul>

 </div>
