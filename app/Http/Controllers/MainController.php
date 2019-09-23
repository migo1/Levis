<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Party;

class MainController extends Controller
{
    public function getParties($id)
    {
        $party = Party::where('transaction_id', $id)->pluck('name', 'id');
        return json_encode($party);
    }
}
