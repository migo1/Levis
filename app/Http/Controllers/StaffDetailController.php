<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\StaffDetail;
use DB;

class StaffDetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('staff_detail.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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
    

      
        $staff = new StaffDetail;
        $staff->user_id = $request->input('user_id');
        $user_id = $staff->user_id;
        $staff->DOB = $request->input('DOB');
        $staff->gender = $request->input('gender');
        $staff->id_number = $request->input('id_number');
        $staff->staff_id = $request->input('staff_id');
        $staff->mobile_number = $request->input('mobile_number');
        $staff->NHIF_number = $request->input('NHIF_number');
        $staff->NSSF_number = $request->input('NSSF_number');
        $staff->employment_date = $request->input('employment_date');
        $staff->status = $request->input('status');



        $found = StaffDetail::where('user_id', $user_id)->count();

           if($found == 0) {
        $staff->user_id = $user_id;
        $staff->save();
        return redirect()->back();
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
        $user = User::find($id);
        return view('staff_detail.show',compact('user'));
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
