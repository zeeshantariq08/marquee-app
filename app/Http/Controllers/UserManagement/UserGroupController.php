<?php

namespace App\Http\Controllers\UserManagement;

use App\UserGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Toastr;

class UserGroupController extends Controller
{

    public function index(){

        $usergroups = UserGroup::all();
        return view("usergroup.index", compact('usergroups'));

    }

    public function show($slug){

        $usergroup = UserGroup::where('slug', $slug)->firstorFail();
        return view("usergroup.show", compact('usergroup'));

    }
    public function create(){
        $usergroups = new UserGroup();
        return view('usergroup.create')->with('usergroup',$usergroups);
    }


    public function store(Request $request){
        $this->validate($request,[
            'name' => 'string|required|unique:user_groups',
            'description' =>'string|nullable'
        ]);
        $usergroup = new UserGroup;
        $usergroup->name = $request->name;
        $usergroup->description = $request->description;
        $usergroup->slug = Str::slug($request->name,'-');

        $usergroup->save();
        Toastr::success('User Group added Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->back();
    }
    public function edit($slug)
    {
        $usergroup =  UserGroup::where('slug',$slug)->first();
        return view('usergroup.create')->with('usergroup',$usergroup);
    }
    public function update(Request $request, $slug)
    {
        $this->validate($request,[
            'name' => 'string|required',
            'description' =>'string|nullable'
        ]);
        $usergroups = UserGroup::where('slug',$slug)->first();

        $usergroups->name = $request->name;
        $usergroups->description = $request->description;
         $usergroups->save();
        Toastr::success('User Group updated Successfully', 'Success', ["positionClass" => "toast-bottom-right"]);

        return redirect()->route('usergroups.index');
    }

    public function toggleStatus($id)
    {
        $usergroup = UserGroup::find($id);
        if($usergroup->status){
            $usergroup->status = 0;
        } else {
            $usergroup->status = 1;
        }
        $usergroup->save();
        return redirect()->back();
    }
}
