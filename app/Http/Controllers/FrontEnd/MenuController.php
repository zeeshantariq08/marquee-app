<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Marquee;
use Toastr;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Marquee $marquee)
    {
        $menus = $marquee->menus()->with('marquee')->get();
        //dd($marquee->id);
        //return view('bids.index',compact('tender','bids'));

        return view('menu.index', compact('marquee', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Marquee $marquee)
    {
        $menu = new Menu();   
        //dd($tenderCategory->toArray());
        return view('menu.create', compact('marquee','menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Marquee $marquee, Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|string',
            'price' => 'bail|required',
        ]);

        //dd($request->toArray());

        $marquee->menus()->create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        Toastr::success('Data Created Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('marquee.menu.index',$marquee->id); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $menus = Menu::where('marquee_id', $id)->get();
        
        // return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marquee $marquee, Menu $menu)
    {
        //$bid = new Bid();   
        //dd($bid->toArray());
        return view('menu.create', compact('marquee','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Marquee $marquee, Menu $menu, Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|string',
            'price' => 'bail|required',
        ]);

        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        Toastr::success('Data Updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        
        return redirect()->route('marquee.menu.index',$marquee->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marquee $marquee, Menu $menu)
    {
        $menu->delete();

        Toastr::success('Data Deleted Successfully', 'Danger', ['positionClass' => 'toast-top-right']);

        return back();
    }
}
