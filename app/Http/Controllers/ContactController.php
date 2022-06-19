<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ContactController extends Controller
{

    public function index()
    {
        $messages = Contact::where('recever',Auth()->user()->id)->get();
        return view('contacts.index',compact('messages'));
    }


    public function create()
    {
        $users = User::all();
        return view('contacts.create',compact('users'));
    }


    public function store(Request $request)
    {
        $message_file =  $request->file('image');
        $sender = Auth()->user()->id;
        if($message_file){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($message_file->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'files/contacts/';
        $last_img = $up_location.$img_name;
        $message_file->move($up_location,$img_name);
        
        Contact::create([
            'sender' => $sender,
            'recever' => $request->recever,
            'message' => $request->message,
            'image'   => $last_img
        ]);
         } else {
            Contact::create([
                'sender' => $sender,
                'recever' => $request->recever,
                'message' => $request->message
            ]);
         }

        return redirect()->route('contacts')->with('success','تم إرسال الرسالة');
    }


    public function show($id)
    {
        $users = User::all();
        $messages = Contact::where('recever',Auth()->user()->id)
                         ->Orwhere('sender' ,Auth()->user()->id)->get();
        return view('contacts.show',compact('messages','users'));
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
