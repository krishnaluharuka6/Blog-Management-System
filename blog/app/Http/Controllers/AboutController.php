<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
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
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image'=>'image|required',
            'content'=>'required',
        ]);

        $about=new About();

        $image=$request->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads",$file_name,'public');
        $about->image=$filePath;

        $about->content=$request->content;
        $about->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(About $about)
    {
        //
    }

    public function editAbout(){
        $about=About::first();
        return view('admin.about.edit',compact('about'));
    }

    public function updateAbout(Request $request){
        $request->validate([
            'image'=>'image|required',
            'content'=>'required',
        ]);

        $about=About::first();

        $image=$request->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads",$file_name,'public');
        $about->image=$filePath;

        $about->content=$request->content;
        $about->save();
        return redirect()->back()->with('success','About Content Updated Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, About $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        //
    }
}
