<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Marquee;
use Toastr;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstCity = City::orderBy('id','ASC')->with('marquees')->first();
        // dd($firstCity->toArray());

        $twoCities = City::orderBy('id','ASC')->with('marquees')->skip(1)->take(2)->get();

        $threeCities = City::orderBy('id','ASC')->with('marquees')->skip(3)->take(3)->get();

        //$cities = City::with('marquees')->get();
        return view('frontEnd.cities', compact('firstCity','twoCities','threeCities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $city = City::with('marquees.bookings')->findOrFail($id);

        //dd($city->toArray());

        return view('frontEnd.marquees', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function marqueeDetail($id)
    {
        $marquee = Marquee::with('city','services','gallerys','menus.dishes')->firstOrFail();
        //dd($marquee->toArray());

        return view('frontEnd.marquee_detail', compact('marquee'));
    }

}
