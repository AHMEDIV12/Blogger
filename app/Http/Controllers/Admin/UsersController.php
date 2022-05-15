<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller
{
    public function index () {
        $users = User::where('category', 'user')->paginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function create () {
        return view('admin.users.create');
    }

    public function store (Request $request) {
        $request->validate([
            'name'      => ['required'],
            'phone'     => ['required', 'unique:users,phone'],
            'email'     => ['required', 'unique:users,email'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password); 
        User::create($data);

        session()->flash('success', 'You created new user successful !');

        return redirect()->route('users.index');
    }

    public function edit (Request $request, $id) {
        $target_user = User::find($id);

        return view('admin.users.edit', compact('target_user'));
    }

    public function update (Request $request, $id) {
        $request->validate([
            'name'  => ['required'],
            'email' => ['required', "unique:users,email,$id"],
            'phone' => ['required', "unique:users,phone,$id"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $target_user = User::find($id);

        $data = $request->all();
        $data['password'] = bcrypt($request->password); 
        $target_user->update($data);

        session()->flash('warning', 'User account was updated');
        return redirect()->route('users.index');
    }

    public function destroy ($id) {
        $target_user = User::find($id);
        isset($target_user) && $target_user->delete();

        session()->flash('danger', 'account was deleted');
        return redirect()->route('users.index');
    }
}
