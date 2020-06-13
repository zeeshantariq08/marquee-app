<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marquee;
use App\MarqueeBooking;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $total_marquees = Marquee::count();

        $booked_marquees = MarqueeBooking::with('marquee')->get();
        //$total = $booked_marquees->count(); 

        $approved_request = MarqueeBooking::where('status', 'approved')->count();

        $pending_request = MarqueeBooking::where('status', 'pending')->count();


        return view('home', compact('total_marquees', 'booked_marquees', 'approved_request', 'pending_request'));
    }
}
