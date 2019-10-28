<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaveRequest;
use App\Leave;
use DB;
use DatePeriod;
use DateInterval;

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
        $leaves = Leave::all();
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


        $this->validate($request, [
            'leave_id' => 'required',
            'from' => 'required',
            'to' => 'required',
            'reason' => 'required',
            'response' => 'required',
           // 'reply' => '',
        ]);
        
        $leave_request = new LeaveRequest;

        $leave_request->user_id = auth()->user()->id;
        $id =  $leave_request->user_id ;
        $leave_request->leave_id = $request->input('leave_id');
        $leave_request->from = $request->input('from');
        $start = $leave_request->from ;
        $leave_request->to = $request->input('to');
        $end = $leave_request->to;
        $to = strtotime($leave_request->to);
        $from = strtotime($leave_request->from) ;

        //weekend
        $diff =$to - $from;
        $leave_request->days_diff = floor($diff / (60*60*24) );
      //  $count = floor($diff / (60*60*24) );
            $count = 0;
        for ($i = $from; $i <= $to; $i = $i + (60 * 60 * 24)) {
            if (date("N", $i) <= 5) $count = $count + 1;
        }     
           $leave_request->days_diff = $count ;
           $difference = $leave_request->days_diff;
       // dd($differecne);
        
        $leave_request->reason = $request->input('reason');
        $leave_request->response = $request->input('response');
        $leave_request->reply = $request->input('reply');
        $days = 40;
//get the remaining days
        $found = LeaveRequest::where('user_id', $id)->count();
        $leaves = DB::table('leave_requests')->where('user_id',$id)->where('days_diff',$difference)->sum('days_diff').$difference;
        $left = DB::table('leave_requests')->where('user_id',$id)->sum('days_diff') + $difference;
        
       // $left = collect(['days_diff'=>$difference]);

       // $left->sum('days_diff');
        //->where('user_id',$id)->collect([$difference])->sum('days_diff');






        $rem = $days - $leaves;
        $remain = $days - $left;
        if ($found == 0) {
          
           
            $leave_request->remainder = $rem;
        } 
        
        elseif($found >= 1 ) {
            //->get('days_diff');
            //$leaves->pluck('days_diff');
          //  dd($left);

            
           $leave_request->remainder = $remain;
        }
      //  dd($leaves);
//validate the max number of days for a leave
            if ($left <= 40 && $left>= 0 ) {
                $leave_request->save();
                return back()->with('success','Leave successfully requested to HR!');

            } 
             else {
                return back()->with('warning','leave request is unsuccesfull ');
            }
            
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
        $id =  $leave_request->user_id ;

        $leave_request->leave_id = $request->input('leave_id');
        $leave_request->from = $request->input('from');
        $leave_request->to = $request->input('to');
        $to = strtotime($leave_request->to);
        $from = strtotime($leave_request->from) ;
         //weekend
         $diff =$to - $from;
         $leave_request->days_diff = floor($diff / (60*60*24) );
       //  $count = floor($diff / (60*60*24) );
             $count = 0;
         for ($i = $from; $i <= $to; $i = $i + (60 * 60 * 24)) {
             if (date("N", $i) <= 5) $count = $count + 1;
         }     
            $leave_request->days_diff = $count ;
            $difference = $leave_request->days_diff;
        // dd($differecne);
         
         $leave_request->reason = $request->input('reason');
         $leave_request->response = $request->input('response');
         $leave_request->reply = $request->input('reply');
         $days = 40;
 
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
