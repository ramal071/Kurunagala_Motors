<?php

namespace App\Http\Controllers;

use App\Calendar;

use Illuminate\Http\Request;
use App\ServiceRepair;

class CalendarController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $events = array();
        $servicerepair = ServiceRepair::all();

        foreach($servicerepair as $s) {
            $events[] = [
                'title' => $s->code,
                'start' => $s->created_at,
                'end'  => $s->updated_at,
            ];
        }
        return view('admin.calendar.index', ['events' => $events]);
    }
}
