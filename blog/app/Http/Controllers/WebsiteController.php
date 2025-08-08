<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.website_setting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $website=new Website;
        $request->validate([
            'title'=>'min:3|required',
            'image'=>'required|image|dimensions:min_width=100,min_height=100',
            'contact'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fb_link'=>'nullable|url',
            'pinterest_link'=>'nullable|url',
            'whatsapp_link'=>'nullable|url',
            'insta_link'=>'nullable|url',
        ]);

        $website->website_title=$request->title;
        $website->contact=$request->contact;
        $website->email=$request->email;
        $website->fb_link=$request->fb_link;
        $website->whatsapp_link=$request->whatsapp_link;
        $website->piterest_link=$request->pinterest_link;
        $website->insta_link=$request->insta_link;

        $image=$request->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads",$file_name,'public');
        $website->logo=$filePath;
        $website->save();

        return redirect()->route('website.create')->with('success','Website details set');
    }
    /**
     * Display the specified resource.
     */
    public function show(Website $website)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Website $website)
    {
        
    }

    public function editWebsite(){
        $website=Website::first();
        return view('admin.website_setting.edit',compact('website'));
    }

    public function updateWebsite(Request $request){
        $website=Website::first();
        $request->validate([
            'title'=>'min:3|required',
            'image'=>'required|image|dimensions:min_width=100,min_height=100',
            'contact'=>'required|numeric|digits:10',
            'email'=>'required|email',
            'fb_link'=>'nullable|url',
            'pinterest_link'=>'nullable|url',
            'whatsapp_link'=>'nullable|url',
            'insta_link'=>'nullable|url',
        ]);

        $website->website_title=$request->title;
        $website->contact=$request->contact;
        $website->email=$request->email;
        $website->fb_link=$request->fb_link;
        $website->whatsapp_link=$request->whatsapp_link;
        $website->pinterest_link=$request->pinterest_link;
        $website->insta_link=$request->insta_link;

        $image=$request->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads",$file_name,'public');
        $website->logo=$filePath;
        $website->save();

        return redirect()->route('website.editWebsite')->with('success','Website details edited');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Website $website)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Website $website)
    {
        //
    }
}
