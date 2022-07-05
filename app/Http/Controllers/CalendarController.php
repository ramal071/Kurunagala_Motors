<?php

namespace App\Http\Controllers;

use App\Calendar;

use Illuminate\Http\Request;
use App\ServiceRepair;

class CalendarController extends Controller
{

    public function index()
    {
        $events = array();
        $servicerepair = ServiceRepair::all();
        //  return $servicerepair;

        foreach($servicerepair as $s) {
            $events[] = [
                'title' => $s->code,
                'start' => $s->created_at,
                'end' => $s->updated_at,
            ];
        }
  //      return $events;

        return view('admin.calendar.index', ['events' => $events]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Calendar $calendar)
    {
        //
    }


    public function edit(Calendar $calendar)
    {
        //
    }

    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    public function destroy(Calendar $calendar)
    {
        //
    }
}
