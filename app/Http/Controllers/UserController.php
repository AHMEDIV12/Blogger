<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Meeting;

class UserController extends Controller
{
    public function show ($id) {
        $target_user    = User::find($id);
        $target_meeting = Meeting::where('doctor_id' ,$id )->get()->first();
        $patient        = User::where('id' , isset($target_meeting->user_id) )->get()->first();
        // dd($target_meeting);

        return view('website.profile', compact('target_user', 'patient'));
    }

    public function update (Request $request, $id) {
        $request->validate([
            'name'      => ['required'],
            'phone'     => ['required', "unique:users,phone,$id"],
            'email'     => ['required', "unique:users,email,$id"],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $target_user = User::find($id);

        $data = $request->all();

        $data['password'] = bcrypt($request->password);
        $target_user->update($data);
        
        session()->flash('success', 'تم تحديث بيانات المستخدم');
        return redirect()->back();
    }
}
