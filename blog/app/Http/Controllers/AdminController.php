<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function index(){
        $user=Auth::user();
        $response = Http::get('http://ip-api.com/json/')->json();
        // $unreadCount = Contact::where('is_read', false)->count();
        return view('admin.dashboard.index',compact('user','response'));
    }

    public function edit(Request $request)
    {
        $user=$request->user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $image=$request->user()->image;
        $file_name=$image->getClientOriginalName();
        $filePath = $image->storeAs("uploads/".$request->user()->id,$file_name,'public');
        $request->user()->image=$filePath;

        $request->user()->save();

        return redirect()->route('admin.edit')->with('success', 'Profile updated');
    }

    /**
     * Delete the user's account.
     */
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
