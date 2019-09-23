<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StaffDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('DOB');
            $table->string('gender');
            $table->bigInteger('id_number')->unique();
            $table->string('staff_id')->unique();
            $table->string('mobile_number')->unique();
            $table->bigInteger('NHIF_number')->unique();
            $table->bigInteger('NSSF_number')->unique();
            $table->date('employment_date');
            $table->string('status');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_details');
    }
}
