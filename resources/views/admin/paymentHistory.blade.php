@extends("layouts.app")
@section("content")
@if(session()->has("success"))
<div class="bg-success text-white p-2">
    <span>{{ session("success") }}</span>
</div>
@endif
<h2>Payment History</h2>
            <div class="table-responsive card card-body">
                <table id="students" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Bank</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Transaction Reference Number</th>
                            <th scope="col">Slip</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your student data here -->
                      @if($payments->count() > 0)
                     @php
                         $i=0;
                     @endphp
                      @foreach ($payments as $payment)
                      <tr>

                        <td>{{ ++$i }}</td>
                        <td>{{ $payment->studentProfile->fullname }}</td>
                        <td>{{ $payment->bank }}</td>
                        <td>{{ $payment->paymentInfo->amount }}</td>
                        <td>{{ $payment->trans_reference_number }}</td>
                        <td>
                            @if ($payment->slip && Storage::disk('public')->exists($payment->slip))
                                <a href="{{ asset('storage/' . $payment->slip) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $payment->slip) }}" style="width:200px;height:100px;" alt="Slip Image">
                                </a>
                            @else
                                No Image
                            @endif
                        </td>

                        <td>{{ $payment->created_at }}</td>
                        <td>
                            <a href="{{ route("admin.editPayment",$payment->id) }}" class="btn btn-primary">Edit</a>
                        </td>

                    </tr>
                      @endforeach

                        @endif

                    </tbody>
                </table>
            </div>
@endsection
