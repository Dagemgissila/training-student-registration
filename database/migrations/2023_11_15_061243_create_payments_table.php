<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("student_profile_id");
            $table->foreign("student_profile_id")->references("id")->on("student_profiles")->onDelete("cascade")->onUpdate("cascade");
            $table->string("bank");
            $table->string("trans_reference_number");
            $table->unsignedBigInteger("payment_info_id");
            $table->foreign("payment_info_id")->references("id")->on("payment_infos")->onDelete("cascade")->onUpdate("cascade");
            $table->string("slip")->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
