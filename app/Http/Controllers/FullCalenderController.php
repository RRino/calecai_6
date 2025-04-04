<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
  
class FullCalenderController extends Controller
{
    /**
     * Show the application calendar.
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        dd($id);    

        
    }
public function showCalendar()
{
    $events = Event::all();

    return view('fullcalendar', compact('events'));
}
    /**
     * Write code on Method
     *
     * @return response()
     */
   
}

