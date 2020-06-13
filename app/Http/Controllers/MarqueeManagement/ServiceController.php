<?php

namespace App\Http\Controllers\MarqueeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Marquee;
use Illuminate\Support\Str;
use Toastr;
use Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $services = new Service();
        return view('service.create')->with('service',$services)->with('id',$id);
    }
    public function addservice($id)
    {
        $services = new Service();
        return view('service.create')->with('service',$services)->with('id',$id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            "name" => "string|required",
            "description" =>'string|nullable'
            


        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->description;
        $service->marquee_id = $request->marquee_id;

        $service->slug = Str::slug($request->name,'-');
        




        $service->save();
        Toastr::success('Services added Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('services.show',$request->marquee_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($slug){

    //     $marquee = Marquee::where('slug', $slug)->firstorFail();
    //     return view("marquee.show", compact('marquee'));
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $services = Service::where('marquee_id', $id)->get();
        return view('service.index')->with('services',$services)->with('id',$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
