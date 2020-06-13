<?php

namespace App\Http\Controllers\MarqueeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Marquee;
use App\City;
use Illuminate\Support\Str;
use Toastr;
use Auth;
use Illuminate\Support\Facades\Storage;

class MarqueeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marquees = Marquee::with('city')->get();
        return view('marquee.index', compact('marquees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marquee = new Marquee();
        $cities = City::get();

        return view('marquee.create', compact('marquee', 'cities'));
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
            'name' => 'string|required',
            'city_id' => 'bail|required|integer',
            'address' => 'string|required',
            'email' => 'email|required||unique:clients',
            'phone_no' => 'required|max:12|string',
            'description' =>'string|nullable',
            'thumbnail' => 'bail|mimes:jpg,jpeg,bmp,png|max:50000' //5mb
        ]);

        $marquee = new Marquee;
        $marquee->name = $request->name;
        $marquee->city_id = $request->city_id;
        $marquee->address = $request->address;
        $marquee->email = $request->email;
        $marquee->phone_no = $request->phone_no;
        $marquee->description = $request->description;
        $marquee->slug = Str::slug($request->name,'-');
        $marquee->user_id = Auth::id();

        if(request()->hasFile('thumbnail')){

            $image = $request->file('thumbnail');

            $filenametostore = $image->getClientOriginalName();

            $image->move('uploads/marquee/thumbnail',$filenametostore);

            $marquee->thumbnail = $filenametostore;
        }

        $marquee->save();

        Toastr::success('Marquee Information added Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('marquees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug){

        $marquee = Marquee::with('city')->where('slug', $slug)->firstorFail();
        return view("marquee.show", compact('marquee'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($slug)
    {
        $marquee =  Marquee::where('slug',$slug)->firstOrFail();

        $cities = City::get();

        return view('marquee.create', compact('marquee', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function update(Request $request, $slug)
    {
         $this->validate($request,[
            'name' => 'string|required',
            'city_id' => 'bail|required|integer',
            'address' => 'string|required',
            'email' => 'email|required||unique:clients',
            'phone_no' => 'required|max:12|string',
            'description' =>'string|nullable',
            'thumbnail' => 'bail|mimes:jpg,jpeg,bmp,png|max:50000' //5mb

        ]);
        


        $marquee = Marquee::where('slug',$slug)->firstOrFail();

       $marquee->name = $request->name;
       $marquee->city_id = $request->city_id;
       $marquee->address = $request->address;
       $marquee->email = $request->email;
       $marquee->phone_no = $request->phone_no;
       $marquee->description = $request->description;
       $marquee->slug = Str::slug($request->name,'-');
       $marquee->user_id = Auth::id();

        if(request()->hasFile('thumbnail')){

            $image = $request->file('thumbnail');

            $filenametostore = $image->getClientOriginalName();

            $image->move('uploads/marquee/thumbnail',$filenametostore);

            $marquee->thumbnail = $filenametostore;
        }

       $marquee->save();

       Toastr::success('Marquee Information updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

       return redirect()->route('marquees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marquee = Marquee::find($id);
        
        $marquee->delete();

        $filename = $marquee->thumbnail;
        if($filename) {
            $path = public_path().'/uploads/marquee/thumbnail/'.$filename;
            if (file_exists($path)) {
                unlink($path);
            }
        }
       return redirect()->back();
    }


    public function toggleStatus($id)
    {
        $marquee = Marquee::find($id);
        if($marquee->status){
            $marquee->status = 0;
        } else {
            $marquee->status = 1;
        }
        $marquee->save();
        return redirect()->back();
    }
}
