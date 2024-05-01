<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use DB;


class ContactController extends Controller
{

    public function index()
    {
        //$messages = Contact::where('recever',Auth()->user()->id)->get();

        $messages = DB::table('contacts')
                             ->groupBy('sender')
                             ->groupBy('recever')
                             ->where('sender',Auth()->user()->id)
                             ->Orwhere('recever',Auth()->user()->id)
                             ->get();
        return view('contacts.index',compact('messages'));
    }


    public function create()
    {
        $users = User::all();
        return view('contacts.create',compact('users'));
    }


    public function store(Request $request)
    {

     
    if($request->recever){
        $con = count($request->recever);
    } else {
        $con = count($request->sender);
    }

  

    for ($i = 0; $i < $con; $i++) {
        $message_file =  $request->file('image');

        if($request->message_status == 1){
            $recever[$i] = $request->sender[$i];
        } else {
            $recever[$i] = $request->recever[$i];
        } 

     //   dd($request);
        
        $sender = Auth()->user()->id;
        

        if($request->message === null){
           $msg = 'مرفق' ;
        } else {
            $msg =  $request->message;
        }

        if($message_file){
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($message_file->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'files/contacts/';
            $last_img = $up_location.$img_name;
            $message_file->move($up_location,$img_name);

            $answers[] = [
                'sender' => $sender,
                'recever' => $recever[$i],
                'message' => $msg,
                'image'   => $last_img,
                'created_at' => Carbon::now()
            ];
         } else {
            $answers[] = [
                'sender' => $sender,
                'recever' => $recever[$i],
                'message' => $msg,
                'created_at' => Carbon::now()
            ];
         }
        }

    

       // dd($answers);
        Contact::insert($answers);

        return redirect()->back()->with('message','تم إرسال الرسالة');
    }


    public function show($id,$message_status)
    {
        $contact = Contact::find($id);

        //dd($contact);

        $extension = pathinfo(storage_path($contact->image), PATHINFO_EXTENSION);

        $users= User::all();

        $messages = Contact::where('recever',$contact->recever)
                         ->where('sender',$contact->sender)
                         ->get();
        
       if( $contact->status_show == 1){
        $contact->update([
            'status_show' => 0
        ]);
       } 

        
    
        return view('contacts.show',compact('messages','users','contact','extension','message_status'));
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


    public function inbox()
    {
        $messages = DB::table('contacts')
                    ->groupBy('sender')
                    ->where('recever',Auth()->user()->id)
                    ->where('status_show',1)
                    ->orderBy('id','DESC')
                    ->get();

               // dd($messages[0]->id > 0);

                if($messages->count() > 0) {
                    $messages = DB::table('contacts')
                    ->groupBy('sender')
                    ->where('recever',Auth()->user()->id)
                    ->where('status_show',1)
                    ->orderBy('id','DESC')
                    ->get();
                } else {
                    $messages = DB::table('contacts')
                    ->groupBy('sender')
                    ->where('recever',Auth()->user()->id)
                    ->where('status_show',0)
                    ->orderBy('id','DESC')
                    ->get();

                }

                  $message_status = 1;
            return view('contacts.inbox',compact('messages','message_status'));
    }

    public function outbox()
    {
        $messages = DB::table('contacts')
                    ->groupBy('recever')
                    ->where('sender',Auth()->user()->id)
                    ->get();
                    $message_status = 0;
            return view('contacts.outbox',compact('messages','message_status'));
    }


}
