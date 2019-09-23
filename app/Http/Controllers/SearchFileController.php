<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\File;
use App\Client;
use App\Transaction;
use App\User;

class SearchFileController extends Controller
{

    function __construct()
    {
         $this->middleware('auth');
         $this->middleware('permission:file-list');
         $this->middleware('permission:file-create', ['only' => ['create','store']]);
         $this->middleware('permission:file-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:file-delete', ['only' => ['destroy']]);
    }
    public function index()

    {

     $data =  File::orderBy('created_at','desc')->paginate(10);
     $clients = Client::all();
     $transactions = Transaction::all();
     $associates = User::role('Associate')->get();

      return view('search.search_file', compact('data','clients','transactions','associates'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function search(Request $request)

    {   
        $clients = Client::all();
        $transactions = Transaction::all();
        $data = File::orderBy('created_at','desc');
        $associates = User::role('Associate')->get();

        if( $request->transaction_id){

            $data = $data->where('transaction_id', 'LIKE', "%" . $request->transaction_id . "%");

        }

        if( $request->court_day){

            $data = $data->where('court_day', 'LIKE', "%" . $request->court_day . "%");

        }

        if( $request->client_id){

            $data = $data->where('client_id', 'LIKE', "%" . $request->client_id . "%");

        }

        if( $request->reference){

            $data = $data->where('reference', 'LIKE', "%" . $request->reference . "%");

        }
        

     //   if( $request->min_age && $request->max_age ){
//
  //          $data = $data->where('age', '>=', $request->min_age)
//
  //                       ->where('age', '<=', $request->max_age);

    //    }

        $data = $data->paginate(10);

        return view('search.search_file', compact('data','clients','transactions','associates'))->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
