<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use App\Profile;
use App\User;
use Auth;

class GeneralController extends Controller
{
    //

    //change profile picture ajax route
    public function profile_picture(Request $request){

        if($request->hasFile('profile_picture')){
            $path = $request->file('profile_picture')->store('public/profile_pictures');
            $profile = Profile::Where('user_id', Auth::user()->id)->update([
                'image' => $path
            ]);
            if($profile){
                return \Response()->json(['success' => "Image update successfully", 'code' => 200, 'img' => $path]);
            }
            else{
                return \Response()->json(['error' => "Image uploading failed, Please try again", 'code' => 202]);
            }
        }
        else{
            return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }

    }


    //update profile data ajax route
    public function profile_update(Request $request){
        $profile = Profile::where('user_id', Auth::user()->id)->update([
            'gender' => $request->gender,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
        ]);
        if($profile){
            $user = User::where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }
        if($user){
            return \Response()->json(['success' => "Profile update successfully", 'code' => 200]);
        }
        else{
            return \Response()->json(['error' => "Profile updating failed, Please try again", 'code' => 202]);
        }
    }

    //update profile password ajax route
    public function password_update(Request $request){

        if (Hash::check($request->old_password, Auth::user()->password)) {
            if($request->password === $request->password_confirmation){
                $user = User::where('id', Auth::user()->id)->update([
                    'password' => bcrypt($request->password)
                ]);
                if($user){
                    return \Response()->json(['success' => "Password update successfully", 'code' => 200]);
                }
                else{
                    return \Response()->json(['error' => "Profile update failed", 'code' => 202]);
                }
            }
            else{
                return \Response()->json(['Password does not match with confirmation password', 'code' => 202]);
            }
        }
        else{
            return \Response()->json(['Old password is incorrect, please enter valid password', 'code' => 401]);
        }
    }
}
