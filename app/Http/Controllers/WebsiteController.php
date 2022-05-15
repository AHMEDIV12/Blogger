<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Message;
use App\Models\Meeting;
use App\Models\Comment;
use App\Models\Drug;

class WebsiteController extends Controller
{
    public function home () {
        return view('website.home');
    }

    public function about () {
        return view('website.about');
    }

    public function contactus () {
        return view('website.contactus');
    }

    public function messages (Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:1000'],
        ]);

        $data = $request->all();
        Message::create($data);

        session()->flash('success', 'تم ارسال رسالتك بنجاح');
        return redirect()->back();
    }

    public function doctors () {
        $doctors = User::where('category', 'doctor')->orderBy('id', 'desc')->get();
               

        return view('website.doctors', compact('doctors'));
    }

    public function show ($id) {
        $doctor     = User::where('category', 'doctor')->where('id', $id)->first();
        $meeting     = Meeting::where('doctor_id', $doctor->id)->get()->first();

        return view('website.show', compact('doctor', 'meeting'));
    }

    public function doctor_comment (Request $request, $id) {
        $request->validate([
            'comment' => 'required'
        ]);

        $data = [
            'user_id'   => auth()->user()->id,
            'doctor_id' => $id,
            'comment'   => $request->comment
        ];

        Comment::create($data);

        session()->flash('success', 'تم اضافة تعليق بنجاح');
        return redirect()->back();
    }

    public function destroy_comment ($id) {
        Comment::destroy($id);

        session()->flash('success', 'تم حذف التعليق بنجاج');
        return redirect()->back();
    }

    public function request_date (Request $request, $id) {
        $data = $request->all();
        $currentDate  = date('Y-m-d');
        $arrangedDate = $data['date']; 
        if ($currentDate >= $arrangedDate) {    
            session()->flash('danger', ' تاريخ قديم');
            return redirect()->route('web.doctors.show', $id);

        }else{
            $data['user_id']    = auth()->user()->id;
            $data['doctor_id']  = $id;
    
            $meetin = Meeting::create($data);
    
            session()->flash('success', 'تم ارسال طلب حجز معاد بنجاح');
            return redirect()->route('web.doctors.show', $id);
        };

    }

    public function update_request_date (Request $request, $id) {
        $target_meetin = Meeting::find($id);
        $data = $request->all();
        $target_meetin->update($data);
    
        session()->flash('success', ' تم تاكيد الحجز بنجاح ');
        return redirect()->back();
    }

    public function drugs() {
        $drugs = Drug::all();

        return view('website.drugs', compact('drugs'));
    }
    
    public function drugs_create(){
        return view('website.create_drug');
    }

    public function drugs_store(Request $request){
            // dd($request);
        $request->validate([
            'title' => ['required'],
            'desc' => ['required'],
        ]);

        $data = $request->all();
        if ($request->file('img') != null) {
            $request->file('img')->store('public/drugs_imgs');
            $path = 'storage/drugs_imgs/' . $request->file('img')->hashName();
            $data['img'] = $path;
        }

        $data['user_id'] = auth()->user()->id;
        $drug = Drug::create($data);

        session()->flash('success', 'تم اضافة الدواء بنجاح');

        return redirect(route('drugs'));
    }

    public function drugs_delete($id){
      $target_drug = Drug::find($id);
      $target_drug->delete();
        session()->flash('success', 'تم حذف الدواء بنجاح');
        return redirect(route('drugs'));
    }

    public function drugs_update(Request $request , $id){
        // dd($request);
        $data = $request->all();
        if ($request->file('img') != null) {
            $request->file('img')->store('public/drugs_imgs');
            $path = 'storage/drugs_imgs/' . $request->file('img')->hashName();
            $data['img'] = $path;
        }
        $targe_drug = Drug::find($id);
        $targe_drug->update($data);

        $drug = Drug::all();
        session()->flash('success', 'تم تعديل الدواء بنجاح');
        return redirect(route('drugs'));
    }

    public function drugs_edit($id){
            $drug = Drug::find($id);
        return view('website.drug_edit', compact('drug'));
    }

    
     public function show_diseases(){
        return view('website.diseases');
    }

}
