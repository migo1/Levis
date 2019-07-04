<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveRequest;
use App\Leave;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave_requests = Leave::all();
        return view('dashboard.leave_request', compact('leave_requests'));
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
        $leave_request = new LeaveRequest;

        $leave_request->user_id = auth()->user()->id;
        $leave_request->leave_id = $request->input('leave_id');
        $leave_request->from = $request->input('from');
        $leave_request->to = $request->input('to');
        $to = strtotime($leave_request->to);
        $from = strtotime($leave_request->from) ;
        $diff =$to - $from;
        $leave_request->days_diff = floor($diff / (60*60*24) );
        $leave_request->reason = $request->input('reason');
        $leave_request->response = $request->input('response');
        $leave_request->reply = $request->input('reply');
        $leave_request->save();
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
        $leave_request = LeaveRequest::findOrFail($request->leave_request_id);

        $leave_request->user_id = auth()->user()->id;
        $leave_request->leave_id = $request->input('leave_id');
        $leave_request->from = $request->input('from');
        $leave_request->to = $request->input('to');
        $to = strtotime($leave_request->to);
        $from = strtotime($leave_request->from) ;
        $diff =$to - $from;
        $leave_request->days_diff = floor($diff / (60*60*24) );
        $leave_request->reason = $request->input('reason');
        $leave_request->response = $request->input('response');
        $leave_request->reply = $request->input('reply');

        $leave_request->update();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $leave_request = LeaveRequest::findOrFail($request->leave_request_id);
        $leave_request->delete();
        return back();
    }
}
