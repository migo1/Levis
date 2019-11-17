<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\File;
use App\Client;
use App\Transaction;
use App\LeaveRequest;
use App\Leave;
use DB;
use App\Holiday;
use Illuminate\Support\Facades\Auth;

use MaddHatter\LaravelFullcalendar\Facades\Calendar;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $events = [];
        $data = File::all();
       // $holidays = Holiday::whereMonth('holiday_date', '=', date('m'))->whereDay('holiday_date', '=', date('d'))->get();

       $holidays = Holiday::whereRaw('DAYOFYEAR(curdate()) <= DAYOFYEAR(holiday_date) AND DAYOFYEAR(curdate())  >=  dayofyear(holiday_date)');
    //  ->orderByRaw('DAYOFYEAR(holiday_date)');
     // $holidays = Holiday::pluck('holiday_date')->toArray();
//dd($holidays);
        if($data->count()) {
            foreach ($data as $key => $value) {

               

                $events[] = Calendar::event(
                    $value->client->name,
                    false,
                    //new \DateTime($value->start_date),
                    new \DateTime($value->court_day),

                    //new \DateTime($value->end_date.' +1 day'),
                    new \DateTime($value->court_day),
                    //null,
                    $value->id,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
	                   // 'url' => 'pass here url and any route',
	                ]
                );
            }
        }

        if($holidays->count()) {
            foreach ($holidays as $key => $holiday) {

               

                $events[] = Calendar::event(
                    $holiday->holiday_name,
                    false,
                    //new \DateTime($value->start_date),
                    new \DateTime($holiday->holiday_date),

                    //new \DateTime($value->end_date.' +1 day'),
                    new \DateTime($holiday->holiday_date),
                    //null,
                    $holiday->id,
                    // Add color and link on event
	                [
	                    'color' => '#3490dc',
	                   // 'url' => 'pass here url and any route',
	                ]
                );
            }
        }

        
        $calendar = Calendar::addEvents($events);

        $todays_case = File::whereDate('court_day',DB::raw('CURDATE()'))->paginate(5);
        $users = User::all()->count();
        $clients = Client::all()->count();
        $files = File::all()->count();
        $transactions = Transaction::all()->count();
        $leaves = Leave::all();
        $leave_req = Auth::user()->leaveRequests()->orderBy('created_at','desc')->paginate(5);
     //   $holidays = Holiday::all();

        return view('dashboard.index',compact('todays_case','calendar','users','clients','files','transactions','leaves','leave_req'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        
        return view('layouts.master', compact('user'));
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
