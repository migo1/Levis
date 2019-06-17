<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;

class FileController extends Controller
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
        $files = File::orderBy('created_at','desc')->paginate(5);
        return view('file.index',compact('files'))->with('i', (request()->input('page', 1) - 1) * 5);
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
        $file = new File;
        while (true)
        {
            try
            {
                
                $file->transaction_id = $request->input('transaction_id');
                $file->court_day = $request->input('court_day');
                $file->description = $request->input('description');
                $file->client_id = $request->input('client_id');
                $file->reference  = rand(100000000,1000000000);
                $client_id = $file->client_id;
                $transaction_id = $file->transaction_id;
                $file->save();
                //  We could save now we break out of the loop
                break;
            }
            catch (Exception $e)
            {
                //  Could not save, try it again
            }
        }
        return redirect()->route('clients.show',$client_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
