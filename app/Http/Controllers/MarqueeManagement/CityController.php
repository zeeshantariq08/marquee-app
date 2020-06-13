<?php

namespace App\Http\Controllers\MarqueeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use Toastr;
// use Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::get();
        //dd($cities->toArray());
        return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = new City();   

        return view('city.create', compact('city'));
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

        $this->validate($request,[
            'name' => 'bail|required|string|unique:cities,name',
            'thumbnail' => 'bail|mimes:jpg,jpeg,bmp,png|max:50000' //5mb
        ]);

        $city = new City;
        $city->name = $request->name;

        if(request()->hasFile('thumbnail')){

            $image = $request->file('thumbnail');

            $filenametostore = $image->getClientOriginalName();

            $image->move('uploads/marquee/city',$filenametostore);

            $city->thumbnail = $filenametostore;
        }

        $city->save();

        Toastr::success('Data Created Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('city.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('city.create', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $this->validate($request, [
            'name' => 'bail|required|string|unique:cities,name,'.$city->id,
            'thumbnail' => 'bail|mimes:jpg,jpeg,bmp,png|max:50000' //5mb
        ]);

        $city = city::where('id',$city->id)->firstOrFail();

        $city->name = $request->name;

        if(request()->hasFile('thumbnail')){

            $image = $request->file('thumbnail');

            $filenametostore = $image->getClientOriginalName();

            $image->move('uploads/marquee/city',$filenametostore);

            $city->thumbnail = $filenametostore;
        }

        $city->save();

        Toastr::success('Data Updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('city.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        

        $city->delete();

        $filename = $city->thumbnail;
        if($filename) {
            $path = public_path().'/uploads/marquee/thumbnail/'.$filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }


        Toastr::success('Data Deleted Successfully', 'Danger', ['positionClass' => 'toast-bottom-right']);

       return redirect()->route('city.index');
    }
}
