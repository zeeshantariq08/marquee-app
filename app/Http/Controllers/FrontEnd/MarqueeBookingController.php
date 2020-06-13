<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MarqueeBooking;

use Illuminate\Support\Facades\Redirect;
use Toastr;
use Carbon\Carbon;

class MarqueeBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookedMarquees = MarqueeBooking::with('marquee', 'menu')->get();
        return view('marqueeBooking.index',compact('bookedMarquees'));
    }


    public function marqueeStatus($id, $status)
    {
        //dd($id.' '. $status);
        $bookedMarquee = MarqueeBooking::find($id);
        $bookedMarquee->status = $status;
        $bookedMarquee->save();

        Toastr::success('Booked Marquee Status Updated successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('booking.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->toArray());
        $currentDatetime = Carbon::now();
        $currentDate = $currentDatetime->toDateString();
        $this->validate($request, [
            'name' => 'bail|required|string',
            'marquee_id' => 'bail|required|integer', 
            'email' => 'bail|required|string',
            'contact_no' => 'bail|required|string',
            'guests' => 'bail|required|integer',
            'reserve_date' => 'bail|required|date|after_or_equal:'.$currentDate,
            'menu_id' => 'bail|required|integer',
            'function_type' => 'bail|required|string',
            'function_time' => 'bail|required|string',
            'message' => 'bail|required|string',
        ]);

        $already_booked = MarqueeBooking::where('marquee_id', $request->marquee_id)->where('reserve_date', $request->reserve_date)->where('function_time', $request->function_time)->firstOrFail();

        if($already_booked) {

            return redirect()->route('marquee_detail',$request->marquee_id)->with('already_booked', 'Already booked that date&time.
                Please Choose another Date!');

        } else {

            MarqueeBooking::create([
            'name' => $request->name,
            'marquee_id' => $request->marquee_id, 
            'email' => $request->email,
            'contact_no' => $request->contact_no,
            'guests' => $request->guests,
            'reserve_date' => $request->reserve_date,
            'menu_id' => $request->menu_id,
            'function_type' => $request->function_type,
            'function_time' => $request->function_time,
            'message' => $request->message,
            'status' => 'pending',
        ]);

        return redirect()->route('marquee_detail',$request->marquee_id)->with('book_message', 'We usually reply in less than 24 hours.
                    Thank you for getting in touch with us!'); 

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($status)
    {
        $bookedMarquees = MarqueeBooking::with('marquee', 'menu')->where('status', $status)->get();
        if($status === 'approved') {
            $pageTitle = 'Approved Request';
        } else {
            $pageTitle = 'Pending Request';
        }
        return view('marqueeBooking.filterBookedMarguee',compact('bookedMarquees', 'pageTitle'));
    }

    
    public function destroy($id)
    {
        $bookedMarquee = MarqueeBooking::find($id);
        $bookedMarquee->delete();

        Toastr::success('Data Deleted Successfully', 'Danger', ['positionClass' => 'toast-top-right']);

        return back();
    }
}
