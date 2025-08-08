<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact=Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contact.show',compact('contact'));
    }

    public function markRead($id)
    {
        $msg = Contact::findOrFail($id);
        $msg->is_read = true;
        $msg->save();
        return redirect()->back()->with('success', 'Marked as read');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $contact=new Contact;
        $request->validate([
            'name'=>'required|max:50',
            'email'=>'required|email',
            'contact'=>'numeric|digits:10',
            'message'=>'required',
        ]);

        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->contact=$request->contact;
        $contact->message=$request->message;
        $contact->save();

        return back()->with('success', 'Thank you for contacting us!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
