<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        
        $user = User::find($user_id);

        


        return view('payments.index',compact('user'));
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


        $payment = new Payment;

        $payment->user_id = $request->input('user_id');
        $payment->payroll_id = $request->input('payroll_id');
        $payment->status = $request->input('status');
        $payment->save();


        //Payment::create($request->all() + ['user_id' => $user_id]);

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $payment = Payment::findOrFail($request->payment_id);

        $payment->user_id = $request->input('user_id');
        $payment->payroll_id = $request->input('payroll_id');
        $payment->status = $request->input('status');

        $payment->update();

return back();

    //  foreach ($user->payments as $payment) {
          # code...
      //}

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $payment = Payment::findOrFail($request->payment_id);
        $payment->delete();
        return back();
    }
}
