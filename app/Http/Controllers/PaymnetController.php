<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\StudentProfile;

class PaymnetController extends Controller
{
    public function index($id){
        $student_id=$id;
        $student_profile=StudentProfile::find($id);
        if(!$student_profile){
            abort(404);
        }
        $payments=Payment::query()->where("student_profile_id",$id)->get();
        return view("admin.addPayment",compact("student_id","payments"));
    }

    public function addPayment(Request $request){
         $request->validate([
            "student_id"=>"required",
            "bank"=>"required",
            "trans_reference_number"=>"required|unique:payments",
            "payment_amount"=>"required",
            "slip" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000"
         ]);

         $student=StudentProfile::find($request->student_id);
         $totalPaidMonth=$student->payment->sum("paymentInfo.month");
         $leftPayment=4-$totalPaidMonth;
         if ($request->payment_amount > $leftPayment) {
            $errorMessage = "Invalid payment amount. The student has already paid for $totalPaidMonth month(s), and there are $leftPayment month(s) left for payment please select valid amount of Money.";
            return back()->with("error", $errorMessage);
        }

$path=null;
         if ($request->hasFile('slip')) {
            $file = $request->file('slip');

            // Store the file in the 'slip' directory within the storage disk
            $path = $file->store('slip', 'public');
        }
            // Save the file path in the database
            $payment = new Payment();
            $payment->student_profile_id=$request->student_id;
            $payment->bank = $request->bank;
            $payment->trans_reference_number = $request->trans_reference_number;
            $payment->payment_info_id = $request->payment_amount;
            $payment->slip = $path;
            $payment->save();

            StudentProfile::whereId($request->student_id)->update([
                "status"=>1
            ]);


            alert()->success('success','payment added succesfully');
            return redirect()->route("student");

    }

     public function viewPaymentHistory($id){
        $payments=Payment::query()->where("student_profile_id",$id)->get();
        if($payments){
            return view("admin.paymentHistory",compact("payments"));
        }

        abort(404);

     }

     public function edit($id){
        $payment=Payment::find($id);
        if($payment){
            return view("admin.editPayment",compact("payment"));
        }
     }

     public function update(Request $request,$id){
        $payment=Payment::find($id);

        if(!$payment){
            abort(404);
        }
        $request->validate([
            "bank"=>"required",
            "trans_reference_number"=>"required|unique:payments,trans_reference_number,".$payment->id,
            "payment_amount"=>"required",
            "slip" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5000"
         ]);
         $student = StudentProfile::find($payment->student_profile_id);

         // Calculate total paid months excluding the current payment
         $totalPaidMonth = $student->payment->where('id', '!=', $payment->id)->sum("payment_info_id");

         $leftPayment = 4 - $totalPaidMonth;

         if ($request->payment_amount > $leftPayment) {
             $errorMessage = "Invalid payment amount. The student has already paid for $totalPaidMonth month(s), and there are $leftPayment month(s) left for payment. Please select a valid amount.";
             return back()->with("error", $errorMessage);
         }

         $path=$payment->slip;
         $student_id=$payment->studentProfile->id;
         if ($request->hasFile('slip')) {
            $file = $request->file('slip');
            // Store the file in the 'slip' directory within the storage disk
            $path = $file->store('slip', 'public');
         }

         Payment::whereId($id)->update([
             "bank"=>$request->bank,
             "trans_reference_number"=>$request->trans_reference_number,
             "payment_info_id"=>$request->payment_amount,
             "slip"=>$path
         ]);

         alert()->success('success','Payment history Updated Sucessfully');
         return Redirect()->route("admin.paymentHistory",$student_id);

     }

     public function allPaymentHistory(){
        $payments=Payment::query()->orderBy("created_at","desc")->get();

            return view("admin.allPaymentHistory",compact("payments"));

     }
}
