@extends("layouts.app")
@section("content")
<h2>Add Payment</h2>
@if(session()->has("success"))
<div class="bg-success p-3">
    <span>{{ session("success") }}</span>
</div>
@endif
@if(session()->has("error"))
<div class="bg-danger text-white font-weight-bold p-3">
    <span>{{ session("error") }}</span>
</div>
@endif
<main>
    <div class="card card-body">
      <form action="{{ route("admin.approvedPayment") }}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="row">
              <div class="col-md-6">
                <input type="hidden" name="student_id" value="{{ $student_id }}" id="">
                  <div class="form-group">
                      <label for="bank" class="d-flex align-items-center">Bank: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                      <select class="form-control" id="bank" name="bank" required>
                          <option value="" disabled selected>Select Bank</option>
                          <option value="CBE">Commercial Bank of Ethiopia</option>
                          <option value="Bank of Abyssinia">Bank of Abyssinia </option>
                          <option value="Ahadu Bank">Ahadu Bank </option>
                      </select>
                      @error("bank")
                           <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="Reference" class="d-flex align-items-center">Transcation Reference Number <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                      <input type="text" class="form-control" placeholder="Enter Reference number" id="" name="trans_reference_number" required>
                  </div>
                  @error("trans_reference_number")
                    <span class="text-danger">{{ $message }}</span>
                 @enderror
              </div>

          </div>

          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="payment_type" class="d-flex align-items-center">Payment Amount <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                    <select class="form-control" id="payment_amount" name="payment_amount" required>
                        <option value="" disabled selected>Select </option>
                        <option value="1" {{ old("payment_amount")=="1" ?"selected" :"" }}>1 Month 3500 birr</option>
                        <option value="2" {{ old("payment_amount")=="2" ?"selected" :"" }}>2 Months 6000 birr</option>
                        <option value="3" {{ old("payment_amount")=="2" ?"selected" :"" }}>3 Months 9000 birr</option>
                        <option value="4" {{ old("payment_amount")=="4" ?"selected" :" " }}>4 months 11000 birrr</option>
                    </select>
                </div>
                @error("payment_amount")
                <span class="text-danger p-1">{{ $message }}</span>
              @enderror
            </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="slip" class="mt-4">Slip</label>
                      <input type="file" class="form-control" id="slip" name="slip">
                  </div>
                  @error("slip")
                  <span class="text-danger p-1">{{ $message }}</span>
                @enderror
              </div>

          </div>
          <div class="row mt-4">
              <div class="col-md-12">
                  <button type="submit" class="btn text-white font-weight-bold btn-lg" style="background-color: #9933ff;">Submit</button>
              </div>
          </div>
   </form>
    </div>

<h3>Payment History</h3>
    @if($payments->count() > 0)
            <div class="table-responsive card card-body">
                <table id="students" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Transaction Reference Number</th>
                            <th scope="col">Slip</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Add your student data here -->

                     @php
                         $i=0;
                     @endphp
                      @foreach ($payments as $payment)
                      <tr>

                        <td>{{ ++$i }}</td>
                        <td>{{ $payment->studentProfile->fullname }}</td>
                        <td>{{ $payment->paymentInfo->amount }}</td>
                        <td>{{ $payment->trans_reference_number }}</td>

                            <td>
                                @if ($payment->slip && Storage::disk('public')->exists($payment->slip))
                                    <a href="{{ asset('storage/' . $payment->slip) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $payment->slip) }}" style="width: 200px; height: 100px;" alt="Slip Image">
                                    </a>
                                @else
                                    No Slip Found
                                @endif
                            </td>



                        <td>{{ $payment->created_at }}</td>
                        <td>
                            <a href="{{ route("admin.editPayment",$payment->id) }}" class="btn btn-primary">Edit</a>
                        </td>

                    </tr>
                      @endforeach



                    </tbody>
                </table>
            </div>
            @else
            <span>No Payment History Found</span>
            @endif
      </main>

@endsection
