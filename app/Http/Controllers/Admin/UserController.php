<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User, App\Helper;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('users.index',compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required|max:50|unique:users',
            'name' => 'required|max:255',
            'password' => 'required'
        ]);

        $user = new User;
        $user->phone = $request->input('phone');
        $user->name = $request->input('name');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('users.index')
            ->with('success','User created successfully');

    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'phone' => 'required',
            'name' => 'required',
        ]);

        $user = User::find($id);
        if(!$user) {
            $request->session()->flash('error', '用户不存在');
            redirect()->route('users.edit', $id);
        }

        $user->phone = $request->input('phone');
        $user->name = $request->input('name');
        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index');
    }
}
