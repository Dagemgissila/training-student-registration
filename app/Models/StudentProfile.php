<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class StudentProfile extends Model
{
    use HasFactory;

    public function payment(){
        return $this->hasMany(Payment::class,"student_profile_id");
    }
}
