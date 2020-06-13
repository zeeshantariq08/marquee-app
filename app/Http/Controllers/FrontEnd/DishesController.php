<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Dish;
use Toastr;

class DishesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Menu $menu)
    {
        $dishes = $menu->dishes()->with('menu')->get();
        //dd($marquee->id);
        //return view('bids.index',compact('tender','bids'));

        return view('dishes.index', compact('menu', 'dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Menu $menu)
    {
        $dish = new Dish();   
        //dd($tenderCategory->toArray());
        return view('dishes.create', compact('menu','dish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Menu $menu, Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|string',
            'description' => 'bail|required',
        ]);

        //dd($request->toArray());

        $menu->dishes()->create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Toastr::success('Data Created Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('menu.dishes.index',$menu->id); 
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
    public function edit(Menu $menu, Dish $dish)
    {
        //$bid = new Bid();   
        //dd($bid->toArray());
        return view('dishes.create', compact('menu','dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Menu $menu, Dish $dish, Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|string',
            'description' => 'bail|required',
        ]);

        $dish->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        Toastr::success('Data Updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        
        return redirect()->route('menu.dishes.index',$menu->id); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu, Dish $dish)
    {
        $dish->delete();

        Toastr::success('Data Deleted Successfully', 'Danger', ['positionClass' => 'toast-top-right']);

        return back();
    }
}

