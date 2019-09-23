<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\File;
use App\Client;
use App\Transaction;
use App\User;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
         $this->middleware('auth');
      //   $this->middleware('permission:file-list');
        // $this->middleware('permission:file-create', ['only' => ['create','store']]);
         //$this->middleware('permission:file-edit', ['only' => ['edit','update']]);
         //$this->middleware('permission:file-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $transactions = Transaction::all();
        $clients = Client::all();
        $files = File::orderBy('created_at','desc')->paginate(10);
        return view('file.index',compact('files','clients','transactions'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transactions = Transaction::all();
        $client = Client::all();
        return view('file.create', compact('client','transactions'));
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
                $file->party_id = $request->input('party_id');
                $file->court_day = $request->input('court_day');
                $file->description = $request->input('description');
                $file->client_id = $request->input('client_id');
                $file->reference  = rand(100000000,1000000000);
                $client_id = $file->client_id;
                $transaction_id = $file->transaction_id;
                $file->request = $request->input('request');
                $file->reason = $request->input('reason');
                $file->user_id = $request->input('user_id');
                $file->request_reply = $request->input('request_reply');
                $file->reason_reply = $request->input('reason_reply');
                $file->save();
                //  We could save now we break out of the loop
                break;
            }
            catch (Exception $e)
            {
                //  Could not save, try it again
            }
        }

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      #  $client = Client::find($id);
        $files = File::find($id);
        $transactions = Transaction::all(); 
        return view('client.file_edit', compact('files','transactions','associates'));

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
        $file = File::findOrFail($request->file_id);
        $file->transaction_id = $request->input('transaction_id');
        $file->party_id = $request->input('party_id');
        $file->court_day = $request->input('court_day');
        $file->description = $request->input('description');
        $file->client_id = $request->input('client_id');
        $file->request = $request->input('request');
        $file->reason = $request->input('reason');
        $file->user_id = $request->input('user_id');
        $file->request_reply = $request->input('request_reply');
        $file->reason_reply = $request->input('reason_reply');  
        $file->update();

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
                $file = File::findOrFail($request->file_id);
                $file->delete();
              //  $client_id =  $files->client_id;
                return back();
    }
}
