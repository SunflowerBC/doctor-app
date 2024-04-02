<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\AppointmentState;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->enum("state", AppointmentState::values())->default(AppointmentState::DRAFT);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("hospital_id");
            $table->unsignedBigInteger("patient_id");
            $table->unsignedBigInteger("doctor_id");


            $table->foreign('user_id')
                ->references('id')
                ->on('users')->onDelete('cascade');

            $table->foreign('hospital_id')
                ->references('id')
                ->on('hospitals')->onDelete('cascade');

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')->onDelete('cascade');

            $table->foreign('doctor_id')
                ->references('id')
                ->on('doctors')->onDelete('cascade');

            $table->date('appointmentDate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
