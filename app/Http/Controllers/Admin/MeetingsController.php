<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Specialty;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;


class MeetingsController extends Controller
{
    public function index () {
        $meetings = Meeting::orderBy('id', 'desc')->paginate(15);
        

        return view('admin.meetings.index', compact('meetings'));
    }

    public function create () {
        $users   = User::where('category', 'user')->get();
        $doctors = User::where('category', 'doctor')->get();

        return view('admin.meetings.create', compact('users', 'doctors'));
    }

    public function store (Request $request) {
        $request->validate([
            'date' => ['required', "after:". date('Y-m-d')],
            'user_id' => ['required', 'exists:users,id'],
            'doctor_id' => ['required', 'exists:users,id']
        ]);
        
        // Meeting
        $data = $request->all();
        $meetin = Meeting::create($data);
        
        // create meeting
        $url = 'https://api.zoom.us/v2/users/me/meetings';
        $response = Http::withToken(env('ZOOM_TOKEN'))->post($url, [
            "start_time" => $request->date . ":55Z",
        ]);
        $response = (array) json_decode($response->body());

        $meetin->start_url = $response['start_url'];
        $meetin->join_url = $response['join_url'];
        $meetin->save();

        session()->flash('success', "New Meetin was created succeessfuly");
        return redirect()->route('meetings.index');
    }

    public function edit ($id) {
        $target_meeting = Meeting::find($id);
        // $related_user   = User::where('id' , $target_meeting->user_id);
        // dd($related_user);
        $users   = User::where('category', 'user')->get();
        $doctors = User::where('category', 'doctor')->get();

        return view('admin.meetings.edit', compact('target_meeting', 'users', 'doctors'));
    }

    public function update (Request $request, $id) {
        $request->validate([
            'date' => ['required', "after:". date('Y-m-d')],
            'user_id' => ['required', 'exists:users,id'],
            'doctor_id' => ['required', 'exists:users,id']
        ]);

        // Meeting
        $data = $request->all();
        $target_meeting = Meeting::find($id);
        $target_meeting->update($data);
        
        // create meeting
        $url = 'https://api.zoom.us/v2/users/me/meetings';
        $response = Http::withToken(env('ZOOM_TOKEN'))->post($url, [
            "start_time" => $request->date . ":55Z",
        ]);
        $response = (array) json_decode($response->body());

        $target_meeting->start_url = $response['start_url'];
        $target_meeting->join_url  = $response['join_url'];
        $target_meeting->save();

        session()->flash('warning', "Meeting was updated succeessfuly");
        return redirect()->route('meetings.index');
    }

    public function destroy ($id) {
        $target_meeting = Meeting::find($id);
        $target_meeting->delete();

        return redirect()->route('meetings.index');
    }
}
