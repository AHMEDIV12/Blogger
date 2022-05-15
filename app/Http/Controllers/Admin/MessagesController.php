<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Message;

class MessagesController extends Controller
{
    public function index () {
        $messages = Message::orderBy('id', 'desc')->paginate(15);

        return view('admin.messages.index', compact('messages'));
    }

    public function destroy ($id) {
        Message::destroy($id);

        session()->flash('danger', 'You deleted message');
        return redirect()->back();
    }
}
