<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StudentProfile;
use App\Models\PaymentInfo;

class Payment extends Model
{
    use HasFactory;

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class, "student_profile_id");
    }

    public function paymentInfo()
    {
        return $this->belongsTo(PaymentInfo::class, "payment_info_id");
    }
}

