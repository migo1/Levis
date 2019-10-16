<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->float('basic');
            $table->float('house_allowance')->nullable();
            $table->float('medical_allowance')->nullable();
            $table->float('other_allowance')->nullable();
            $table->float('gross_pay')->nullable();
            $table->float('PAYE')->nullable();
            $table->float('NSSF');
            $table->float('NHIF');
            $table->float('deductions')->nullable();
            $table->float('relief')->nullable();
            $table->float('net_pay')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
}
