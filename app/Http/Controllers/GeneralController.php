<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use App\Profile;
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
                return \Response()->json(['success' => "Image Update successfully", 'code' => 200, 'img' => $path]);
            }
            else{
                return \Response()->json(['error' => "Image uploading failed, Please try again", 'code' => 202]);
            }
        }
        else{
            return \Response()->json(['error' => "Image uploading failed", 'code' => 202]);
        }

    }
}
