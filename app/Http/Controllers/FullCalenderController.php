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
    public function index(Request $request)
    {
  
        if($request->ajax()) {
       
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
                       dd($data);
             return response()->json($data);
        }
  
        return view('fullcalender');
    }
 
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request): JsonResponse
    {
 
        switch ($request->type) {
           case 'add':
              $event = Event::create([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'update':
              $event = Event::find($request->id)->update([
                  'title' => $request->title,
                  'start' => $request->start,
                  'end' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Event::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}

