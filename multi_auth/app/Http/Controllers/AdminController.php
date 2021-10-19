<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('backend.admin.index');
    }

    public function profile(){
        $profile = Auth()->user();
        return view('backend.admin.profile',compact('profile'));
    }

    public function profile_update(Request $req){
        $profile_update = User::find($req->id);
        $profile_update->name = $req->name;
        $profile_update->email = $req->email;
        $old_photo = $req->input('old_photo');
        if (!empty($req->file('photo'))) {
            $profileimage = $req->file('photo');
            $profileName = time() . '.' . $profileimage->getClientOriginalName();
            $profileimage->move(public_path('profile_photo'), $profileName);
            $profile_update->photo = $profileName;
        } else {
            $profile_update->photo =  $old_photo;
        }$old_photo = $req->input('old_photo');

        $profile_update->save();
        return redirect()->route('admin.profile');
    }
}
