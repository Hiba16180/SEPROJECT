<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CalendarController extends Controller
{
   public function index()
   { 
    $user= auth()->id();
    $events = array();
    $bookings = Booking::where('user_id',$user)->get();
    foreach($bookings as $booking) {
        $events[] = [
            'id'=> $booking->ID,
            'title' => $booking->title,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
        ];
    }
   

    return view('calendar.index', ['events' => $events,]);
   }
   public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string'
        ]);
        $user=auth()->id();
        $booking = Booking::create([
            'user_id' => $user,
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json([
            'id' => $booking->ID,
            'start_date' => $booking->start_date,
            'end_date' => $booking->end_date,
            'title' => $booking->title,

        ]);
    }
    public function update(Request $request, $id)
    {
        $booking = DB::table('bookings')->find($id);

    if (! $booking) {
        return response()->json([
            'error' => 'Unable to locate the event'
        ], 404);
    }

    DB::table('bookings')
        ->where('ID', $id)
        ->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return response()->json('Event updated successfully');
        
    }
    public function destroy(Request $request, $id)
    {
        $booking = DB::table('bookings')->find($id);

        if(! $booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        }
        DB::table('bookings')->where('ID', $id)->delete();

        return response()->json('Event deleted successfully');

    }
    public function chart()
    {
        $teacher = User::find(auth()->id());
        if (!$teacher) {
            // Handle case when teacher is not found
            return "No teacher found";
        }
        $bookings = Booking::select(
            DB::raw('COUNT(*) as count'),
            DB::raw('MONTH(start_date) as month')
        )
        ->where('user_id',auth()->id())
        ->groupBy('month')
        ->pluck('count','month');
      
            $monthNames = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            $data = [];
            $labels =range(1,12);
            foreach ($monthNames as $key => $monthName) {
                $month = $key ; // Generate the month number (1 to 12) based on the array index
                $data[] = $bookings[$month+1] ?? 0; // Use 0 if no data is available for the month
            }
            $visitsPerMonth = DB::table('visites')
            ->select(DB::raw('MONTH(date) AS month'), DB::raw('SUM(visites) AS total_visits'))
            ->groupBy('month')
            ->get();
    
        return view('calendar.chart', compact('labels', 'data', 'monthNames','visitsPerMonth'));
    }
}

