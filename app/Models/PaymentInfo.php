<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;

class PaymentInfo extends Model
{
    use HasFactory;

    public function payments()
    {
        return $this->hasMany(Payment::class, "payment_info_id");
    }
}
