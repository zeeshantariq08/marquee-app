<?php

namespace App\Http\Controllers\MarqueeManagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ImageUpload;
use Illuminate\Support\Str;
use Toastr;
use Auth;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function storeimage(Request $request)
        {
            $image = $request->file('file');
            $imageName = $image->getClientOriginalName();
            $image->move('uploads/marquee/gallery',$imageName);
             $acb = ImageUpload::create([

                'marquee_id'=> $request->marquee_id,
                'user_id' => Auth::id(),
                'filename'=>  $imageName

            ]);
            return response()->json(['success'=>$imageName]);
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $gallerys = ImageUpload::where('marquee_id', $id)->get();
        return view('gallery.index')->with('gallerys',$gallerys)->with('id',$id);
    }
    public function addimage($id)
    {
        $gallerys = new ImageUpload();
        return view('gallery.index')->with('gallerys',$gallerys)->with('id',$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

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
    public function destroy(Request $request,$id)
    {
        $image = ImageUpload::find($id);
        $filename = $image->filename;
        ImageUpload::where('filename',$filename)->delete();
        $path = public_path().'/uploads/marquee/gallery/'.$filename;
        if (file_exists($path)) {
            unlink($path);
        }
       return redirect()->back()->with('id',$request->marquee_id)->withInput($request->all());
        
    }
}
