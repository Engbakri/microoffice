<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $ads = Ads::all();
     return view('ads.index',compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message_file =  $request->file('image');
        
        if($message_file){
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($message_file->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'files/ads/';
        $last_img = $up_location.$img_name;
        $message_file->move($up_location,$img_name);
        
        Ads::create([
            'ads_title' => $request->ads_title,
            'ads_desc' => $request->ads_desc,
            'ads_image'   => $last_img,
            'ads_userid'  =>  Auth()->user()->id
        ]);
         } else {
            Ads::create([
                'ads_title' => $request->ads_title,
                'ads_desc' => $request->ads_desc,
                'ads_userid'  =>  Auth()->user()->id
            ]);
         }

        return redirect()->route('ads.index')->with('success','تم إرسال الرسالة');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Ads::find($id);
        $extension = pathinfo(storage_path($ads->ads_image), PATHINFO_EXTENSION);
       // dd($ads->ads_title);
        return view('ads.show',compact('ads','extension'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ads  $ads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads)
    {
        //
    }
}
