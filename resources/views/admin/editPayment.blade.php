@extends("layouts.app")
@section("content")
<h2>Edit Payment</h2>
@if(session()->has("success"))
<div class="bg-success text-white p-3">
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
      <form action="{{ route("admin.updatePayment",$payment->id)}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="row">
              <div class="col-md-6">

                  <div class="form-group">
                      <label for="bank" class="d-flex align-items-center">Bank: <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                      <select class="form-control" id="bank" name="bank" required>
                          <option value="" disabled selected>Select Bank</option>
                          <option value="CBE" {{ $payment->bank == "CBE" ? "selected" : ""}}>Commercial Bank of Ethiopia</option>
                          <option value="Bank Of Abyssinia" {{ $payment->bank =="abyssinia bank" ? "selected" : "" }}>Bank Of Abyssinia</option>
                          <option value="Ahadu Bank" {{ $payment->bank =="Ahadu Bank" ? "selected" : "" }}>Ahadu Bank</option>
                      </select>
                      @error("bank")
                           <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                      <label for="Reference" class="d-flex align-items-center">Transcation Reference Number <span class="text-danger fs-3 font-weight-bold mt-2">*</span></label>
                      <input type="text" class="form-control" value="{{ $payment->trans_reference_number }}" placeholder="Enter Reference number" id="" name="trans_reference_number" required>
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
                        <option value="1" {{ $payment->payment_info_id=="1" ?"selected" :"" }}>1 Month 3500 birr</option>
                        <option value="2" {{ $payment->payment_info_id=="2" ?"selected" :"" }}>2 Months 6000 birr</option>
                        <option value="3" {{ $payment->payment_info_id=="3" ?"selected" :"" }}>3 Months 9000 birr</option>
                        <option value="4" {{ $payment->payment_info_id=="4" ?"selected" :" " }}>4 months 11000 birrr</option>
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
                  <div>
                    @if($payment->slip)
                    <a href="{{ asset('storage/' . $payment->slip) }}" target="_blank"><img src="{{ asset('storage/' . $payment->slip) }}" style="width:200px;height:100px;" alt="Slip Image"></a>
                   @else
                   No Slip Found
                   @endif
                </div>
                  @error("slip")
                  <span class="text-danger p-1">{{ $message }}</span>
                @enderror
              </div>

          </div>
          <div class="row mt-4">
              <div class="col-md-12">
                  <button type="submit" class="btn text-white font-weight-bold btn-lg" style="background-color: #9933ff;">Update</button>
              </div>
          </div>
   </form>
    </div>

      </main>

@endsection
