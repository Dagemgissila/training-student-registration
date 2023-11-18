@extends("layouts.app")
@section("content")
@if(session()->has("success"))
<script>
  Swal.fire({
icon: "success",
title: "Wowow...",
text: "{{ session('success') }}",

});
</script>

@endif
<h2>Student Information</h2>
            <div class="table-responsive card card-body" >
                <table id="students" class="table" style="min-height: 150px;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">School Name</th>
                            <th scope="col">Training Location</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your student data here -->
                      @if($students->count() > 0)
                     @php
                         $i=0;
                     @endphp
                      @foreach ($students as $student)
                      <tr>
                        @php
                        $totalPaidMonths = $student->payment->sum("paymentInfo.month");
                    @endphp
                        <td>{{ ++$i }}</td>
                        <td>{{ $student->fullname }}</td>
                        <td>{{ $student->school_name }}</td>
                        <td>{{ $student->prefered_location }}</td>
                        <td>
                             @if ($student->status == 0)
                             <button class="btn btn-danger btn-sm ">Pending</button>
                             @elseif( ($student->status == 1) && ($student->is_scholarship == 1))
                             <button class="btn btn-success btn-sm ">Approved / Scholarship</button>
                             @elseif( ($student->status == 1) && ($student->is_scholarship == 0))
                             <button class="btn btn-success btn-sm ">Approved</button>
                             @endif
                        </td>
                        <td>
                              @if($student->is_scholarship == 1)
                                  <button class="btn btn-success btn-sm ">Fully Paid</button>
                              @elseif ($student->payment->count() == 0)
                                <button class="btn btn-danger btn-sm ">Pending</button>
                                @elseif ($student->payment->count() > 0)

                                @if($totalPaidMonths >= 4)
                                    <button class="btn btn-success btn-sm">Fully Paid</button>
                                @else
                                    <button class="btn btn-success btn-sm">Paid for {{ $totalPaidMonths }} months</button>
                                @endif
                            @else
                                <button class="btn btn-success btn-sm">Pending</button>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Select Action
                                </button>
                                <div class="dropdown-menu " id="dropdown2">
                                    <a class="dropdown-item btn-info" href="{{ route('admin.viewDetail',$student->id) }}">View Detail</a>
                                    @if($student->is_scholarship == 0)
                                    @if($totalPaidMonths >= 4)
                                    <a class="dropdown-item btn-primary "   href="{{ route("admin.paymentHistory",$student->id) }}">View Payment History</a>
                                    @else
                                    <a class="dropdown-item btn-primary "   href="{{ route("admin.addPayment",$student->id) }}">Add Payment</a>
                                    <a class="dropdown-item btn-primary "  href="{{ route("admin.paymentHistory",$student->id) }}">View Payment History</a>
                                      @endif

                                      @endif

                                </div>
                            </div>
                        </td>
                    </tr>
                      @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
@endsection
