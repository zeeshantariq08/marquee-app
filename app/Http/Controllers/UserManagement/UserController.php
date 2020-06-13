<?php

namespace App\Http\Controllers\UserManagement;

use App\User;
use App\UserGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Toastr;

class UserController extends Controller
{

    public function index()
    {
    	$users = User::all();
    	return view('user.index', compact('users'));

    }

    public function store( Request $request){

        //dd($request->toArray());
        $this->validate($request, [
            'name' => 'string|required',
            'email' => 'email|required|unique:users',
            'password' => 'required|string|min:6',
            'contact' => 'required|max:12|string|nullable',
            'user_group_id' => 'integer|required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->contact = $request->contact;
        $user->user_group_id = $request->user_group_id;
        $user->slug = Str::slug($request->name,'-');

        $user->save();
        Toastr::success('User added Successfully', 'Success', ['positionClass' => 'toast-bottom-right']);

        // return redirect()->route('users.index');

        if($request->has('from_app')){
            return view('frontEnd.index');
        }else{
            return redirect()->route('users.index');
        }

    }


    public function create(){
        $users = new User();
        return view('user.create')->with('user',$users)->with('usergroups',UserGroup::all());
    }

    public function show($slug){

        $user = User::where('slug', $slug)->firstorFail();
        return view('user.show', compact('user'));
    }

    public function toggleStatus($id)
    {
        $user = User::find($id);
        if($user->status){
            $user->status = 0;
        } else {
            $user->status = 1;
        }
        $user->save();
        return redirect()->back();
    }

    public function ChangePassword()
    {
        return view('user.password_change');
    }

    public function UpdatePassword(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            'new_confirm_password' => ['required', 'same:new_password'],
        ]);

        if (Hash::check($data['current_password'], auth()->user()->password)){
            User::find(auth()->user()->id)->update(['password'=> Hash::make($data['new_password'])]);
            Toastr::success('Password Changed Successfully', 'Success', ['positionClass' => 'toast-bottom-right']);
        }else{
            $request->session()->flash('danger', 'Current Password Incorrect');
        }
        return redirect()->back();

    }

}
