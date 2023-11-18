@extends("layouts.app")
@section("content")

<h2>Dashboard</h2>
<div class="row">
    <div class="col-12 col-md-3 mb-2">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <i class="fas fa-users fa-3x"></i>
                <h5 class="card-title">Total Students</h5>
                <p class="card-text">{{ $totalStudent }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 mb-2">
        <div class="card bg-success text-white">
            <div class="card-body">
                <i class="fas fa-check-circle fa-3x"></i>
                <h5 class="card-title">Approved Students</h5>
                <p class="card-text">{{ $approvedStudent }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 mb-2">
        <div class="card bg-info text-white">
            <div class="card-body">
                <i class="fas fa-graduation-cap fa-3x"></i>
                <h5 class="card-title">Scholarship Students</h5>
                <p class="card-text">{{ $scholarShipStudent }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-3 mb-2">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <i class="fas fa-calendar-day fa-3x"></i>
                <h5 class="card-title">Today's Registrations</h5>
                <p class="card-text">{{ $todayRegistration }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
