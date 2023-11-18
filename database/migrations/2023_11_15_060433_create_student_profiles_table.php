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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
            $table->string("fullname");
            $table->integer("age");
            $table->string("gender");
            $table->string("school_name");
            $table->string("school_address");
            $table->integer("grade");
            $table->string("parent_fullname");
            $table->string("email");
            $table->string("type_of_training");
            $table->string("primary_phone", 15); // Assuming a maximum length of 15 characters for a phone number
            $table->string("secondary_phone", 15)->nullable();
            $table->string("prefered_location");
            $table->string("prefered_session");
            //0 for regular student
            //1 for scholarship student
            $table->boolean("is_scholarship")->default(false);
            $table->string("training_source")->nullable();
            $table->boolean("status")->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
