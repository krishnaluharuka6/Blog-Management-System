<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function index(){
        $response = Http::get('http://ip-api.com/json/')->json();
        return view('user.dashboard.index',compact('response'));
    }

    public function edit(Request $request){
        $user=$request->user();
        return view('user.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request){
        $request->user()->fill($request->validated());

        if($request->user()->isDirty('email')){
            $request->user()->email_verified_at=null;
        }

        $image=$request->user()->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads/".$request->user()->id,$file_name,'public');
        $request->user()->image=$filePath;
        $request->user()->save();
        
        return redirect()->route('user.edit')->with('success','Profile Updated');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
