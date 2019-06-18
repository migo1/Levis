<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

use App\File;

class CalendarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $events = [];
        $data = File::all();
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
        $calendar = Calendar::addEvents($events);
        return view('calendar.index', compact('calendar'));
 
    }
}
