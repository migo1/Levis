<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payroll;
use App\User;

class PayrollController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payrolls = Payroll::orderBy('created_at','desc')->paginate(5);
        $users = User::orderBy('created_at','desc')->paginate(5);
    

        return view('payroll.index',compact('payrolls','users'))->with('i',(request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payroll = new Payroll;

       $payroll->user_id = $request->input('user_id');
       $payroll->basic = $request->input('basic');
       $basic = $payroll->basic;
       $payroll->house_allowance = $request->input('house_allowance');
       $house = $payroll->house_allowance;
       $payroll->medical_allowance = $request->input('medical_allowance');
        $medical = $payroll->medical_allowance;
       $payroll->other_allowance = $request->input('other_allowance');
        $others = $payroll->other_allowance;

        $gross =  $basic + $house + $medical + $others;

        $payroll->gross_pay = $gross;

        if ($gross >= 0 && $gross <=12298 ) {

            $payroll->PAYE = 10 / 100 * $gross;

        }elseif ($gross >= 12299 && $gross <=23885){

            $payroll->PAYE = 15 / 100 * $gross;

        }elseif ($gross >= 23886 && $gross <=35472){

            $payroll->PAYE = 20 / 100 * $gross;

        }elseif ($gross >= 35473 && $gross <=47059){

            $payroll->PAYE = 25 / 100 * $gross;

        }elseif ($gross > 47059){

            $payroll->PAYE = 30 / 100 * $gross;

        }else {
            $payroll->PAYE =  0;
        }
      

          
       $payroll->NSSF = $request->input('NSSF');
       $nssf =  $payroll->NSSF ;
       $payroll->NHIF = $request->input('NHIF');
        $nhif =  $payroll->NHIF;

        $deductions = $payroll->PAYE + $nssf + $nhif;

       $payroll->deductions = $deductions;

       $payroll->relief = $request->input('relief');

        $relief = $payroll->PAYE - $payroll->relief;
        $rel = $relief + $nssf + $nhif;

        $net = $gross - $rel;

       $payroll->net_pay = $net;

       $payroll->save();

       return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payroll = Payroll::find($id);

        $user = User::find($id);

//dd($user->payrolls);

        return view('payroll.show',compact('payroll','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('payroll.edit');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
