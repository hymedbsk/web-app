<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
Use App\Http\Requests\UserRequest;
Use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("user.list",compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.add");   
    }

    public function editPassword($id){

        $user = User::findOrFail($id);

        return view("user.password",compact("user"));

    }

    public function storePassword(Request $request, $id){

        $request->validate([
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find($id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('user/'.$id.'/edit')->with('success', 'The password has been changed!');

    }

    public function changeRole($user){

        $user= User::findOrFail($user);

        if($user->admin == 0){

            User::where('id','=', $user->id)->update(['admin'=> 1]);
            return redirect('user');

        }
        else if($user->admin == 1){

            User::where('id','=', $user->id)->update(['admin'=> 0]);
            return redirect('user');        

        }
    }

    public function changeDashboardRole($user){

        $user= User::findOrFail($user);

        if($user->dashboard_viewer == 0){

            User::where('id','=', $user->id)->update(['dashboard_viewer'=> 1]);
            return redirect('user');

        }
        else if($user->dashboard_viewer == 1){

            User::where('id','=', $user->id)->update(['dashboard_viewer'=> 0]);
            return redirect('user');        

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create([
            'name' => $request['name'],
            'firstname' =>$request['firstname'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('user')->with('success', 'The user has been created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return view("user.edit",compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('name');
        $users->firstname = $request->input('firstname');
        $users->email = $request->input('email');
        $users->save();
        return redirect('user')->with('success', 'The user has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('user')->with('success', 'The user has been deleted !');
    }
}