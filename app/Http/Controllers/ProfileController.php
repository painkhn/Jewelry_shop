<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Basket;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function profile()
    // Открытие профиля
    {
        $likes = Like::with('positions')->where('user_id', Auth::user()->id)->get();
        // return view('profile', ['favourites' => $favourites]);    
        return view('profile', ['likes' => $likes]);
    }

    public function edit_profile(Request $request)
    // Редактирование профиля
    {
        $user = Auth::user();
    
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->fathername = $request->fathername;
        $user->number = $request->number;
        $user->city = $request->city;
        $user->gender = $request->gender;
        $user->birthday = $request->birthday;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
    
        $user->save();
    
        return redirect()->back();
    }
}
