<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function profile() {

        $userAuth = Auth::user();

        $user = User::find($userAuth->id);

        if($user->profile) {

            return view('profile.show', ['profile' => $user->profile, 'user' => $user]);

        }
        else {

            return view('profile.add');

        }

    }

    public function profileadd(Request $request) {

        $request->validate([
            'age' => 'required',
            'bio' => 'required'
        ]);

        $userAuth = Auth::user();

        $profile = new Profile;

        $profile->age = $request->input('age');
        $profile->bio = $request->input('bio');
        $profile->user_id = $userAuth->id;

        $profile->save();

        return redirect('/profile')->with('success', 'Profile Added');

    }

    public function profileupdate() {

        $userAuth = Auth::user();

        $user = User::find($userAuth->id);

        $profile = Profile::where('user_id', $user->id)->first();

        return view('profile.edit', ['profile' => $profile, 'user' => $user]);

    }

    public function profilesave(Request $request) {

        $request->validate([
            'age' => 'required',
            'bio' => 'required'
        ]);

        $userAuth = Auth::user();

        $profile = Profile::where('user_id', $userAuth->id)->first();

        $profile->age = $request->input('age');
        $profile->bio = $request->input('bio');
        $profile->user_id = $userAuth->id;

        $profile->save();

        return redirect('/profile')->with('success', 'Profile Updated');

    }
}
