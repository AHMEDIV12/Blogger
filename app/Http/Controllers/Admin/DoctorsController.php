<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Specialty;
use App\Models\Meeting;

class DoctorsController extends Controller
{
    public function index () {
        $users = User::where('category', 'doctor')->paginate('15');

        return view('admin.doctors.index', compact('users'));
    }

    public function create () {
        $specialties = Specialty::all();

        return view('admin.doctors.create', compact('specialties'));
    }

    public function store (Request $request) {
        $request->validate([
            'name'  => ['required'],
            'email' => ['required', 'unique:users,email', 'email'],
            'phone' => ['required', 'unique:users,phone'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'specialty' => ['required', 'string'],
            'description' => ['required', 'max:1000'],
            'days' => ['required']
        ]);
    
        $target_specialty_id = $this->get_specialty($request->specialty);

        $data = $request->all();
        $data['password']     = bcrypt($request->password); 
        $data['specialty_id'] = $target_specialty_id;
        $data['category']     = 'doctor';
        $target_user = User::create($data);
        $days = [];
        foreach($request->days as $day) {
            $days[] = [
                'day' => $day,
                'user_id' => $target_user->id
            ];
        }
        $target_user->doctor_schedule()->insert($days);
        // dd($target_user->doctor_schedule);

        session()->flash('success', 'You created doctor account successfully !');
        return redirect()->route('doctors.index');
    }

    public function edit ($id) {
        $target_user = User::where('id', $id)->where('category', 'doctor')->first();
        $specialties = Specialty::all();

        return view('admin.doctors.edit', compact('target_user', 'specialties'));
    }

    public function update (Request $request, $id) {
        $request->validate([
            'name'  => ['required'],
            'email' => ['required', "unique:users,email,$id", 'email'],
            'phone' => ['required', "unique:users,phone,$id"],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'specialty' => ['required', 'string'],
            'description' => ['required', 'min:10', 'max:1000']
        ]);

        $target_specialty_id = $this->get_specialty($request->specialty);
        
        $target_user = User::where('id', $id)->where('category', 'doctor')->first();
        
        $data = $request->except(['password_confirmation', 'specialty', '_token', '_method']);
        $data['password']     = bcrypt($request->password); 
        $data['specialty_id'] = $target_specialty_id;
        
        $target_user->update($data);
        
        session()->flash('warning', 'You updated doctor account successfully !');
        return redirect()->route('doctors.index');
    }

    public function destroy ($id) {
        $target_user = User::find($id);
        $specialty_of_user = Specialty::where('id' , $id)->get();
        // $meeting_of_user = Meeting::where('doctor_id' , $id)->first();
        // dd( $meeting_of_user);
        // isset($$meeting_of_user) &&  $meeting_of_user->delete();
        // dd($specialty_of_user);
        $specialty_of_user->each->delete();
        // $target_user->specialty->delete();
         $target_user->delete();
        // isset($target_user) && $target_user->delete();

        session()->flash('danger', 'doctor account was deleted');
        return redirect()->route('doctors.index');
    }

    private function get_specialty ($name) {
        /*
            Check if specialty exists ....
            if not create new and get the is
        */ 

        $target_specialty = Specialty::where('name', $name)->first();
        if (!isset($target_specialty)) {
            $target_specialty = Specialty::create([
                'name' => $name
            ]);
        }

        return $target_specialty->id;
    }
}
