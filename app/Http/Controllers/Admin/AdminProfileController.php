<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Profile;
use App\User;
use Session;
use Auth;
class AdminProfileController extends Controller
{
     public function __construct()
    {  
       ini_set('memory_limit', '-1');
    }    
    public function index()
    {	
    	// $admin_profile = Profile::where('profile.user_id','=',Auth::user()->id)->first();
        // $user = User::where('id',Auth::user()->id)->first();
        $admin_profile = Profile::where('user_id',Auth::user()->id)->first();
        $admin_profile_edit = Profile::find(Auth::user()->id);        
        //dd($admin_profile);die();
        return view('Admin_Panel.admin_profile',['admin_profile'=>$admin_profile,'admin_profile_edit'=>$admin_profile_edit]);
    }
    public function ChangeProfileImage(Request $request){
         if($request->hasFile('image')){
            $path = $request->file('image')->store('public/profile_pictures');
            $profile = Profile::Where('user_id', Auth::user()->id)->update([
                'image' => $path
            ]);
            if($profile){
                Session::flash('success_msg','The Profile Picture Was Succesfully Updated!'); 
                return redirect()->back();
            }
            else{
                Session::flash('success_msg','The Profile Picture Was Not Succesfully Updated!'); 
                return redirect()->back();
            }
        }
        else{
           Session::flash('err_message','Please Select Any Image To Update The Profile Picture'); 
                return redirect()->back();
        }
         return redirect()->back();
    }

     public function update(Request $request, $id)
    {
        $this->validate($request, [            
            'user_name' => 'required|max:20',            
            'phone' => 'required',
            'gender' => 'required',            
            'email' => 'required'            
        ]);
        $u = Profile::find($id);        
        if ($u!=null)
        {
        $u->user_name = Input::get('user_name');        
        $u->phone = Input::get('phone');        
        $u->gender = Input::get('gender');
        $date = Input::get('birth_date');    
        $new_date = date("Y-m-d",strtotime($date));
     
        $u->birth_date =  $new_date;
        $u->save();
        }              
        $v = User::find($id);
        if ($v !=null) {
            $user = User::where('email', '=', Input::get('email'))->where('id','!=',Auth::user()->id)->first();
            if ($user === null) {
                $v->email = Input::get('email');
                $v->save();
            }else{
                Session::flash('err_message','This email is already taken try any other please');
                return redirect()->back();
            }
        }  
        return redirect()->back();
              
    }

    // public function Updatepasword(Request $request){
    //     if (Hash::check($request->old_password, Auth::user()->password)) {
    //         if($request->password === $request->password_confirmation){
    //             $user = User::where('id', Auth::user()->id)->update([
    //             'password' => bcrypt($request->password)
    //             ]);
    //             if($user){
    //             session::flash('success_msg','Your Password Is Updated Succesfully');
    //             return redirect()->back();
    //             }
    //             else{
    //             // return \Response()->json(['error' => "Profile update failed", 'code' => 202]);
    //             session::flash('err_message','Your Password Is Not Updated Succesfully');
    //             return redirect()->back();
    //             }
    //         }
    //         else{
    //         // return \Response()->json(['error' => 'Password does not match with confirmation password', 'code' => 202]);
    //         session::flash('err_message','Password And Confirmation Password Do Not Matched');
    //             return redirect()->back();
    //         }
    //     }
    //     else{
    //         session::flash('err_message','Pl');
    //             return redirect()->back();
    //     }
    // }

}
