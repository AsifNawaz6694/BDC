<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use App\User;
use App\Profile;
use App\Roles;
use DB;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */   
    public function __construct()
    {  
       ini_set('memory_limit', '-1');
    }
    
    public function index()
    {
        $args = array();
        $args['users'] = User::leftJoin('roles','roles.id','=','users.roles')
                        ->select('users.name','users.id','users.email','roles.role_name')
                        ->get();     
        return view('Admin_Panel.Users.index')->with($args);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin_Panel.Users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [            
            'name' => 'required|max:20',
            'email' => 'required',        
            'password' => 'required',
            'roles' => 'required|numeric'
        ]);
        $u = new User;
        $u->name = Input::get('name');                
        $u->email = Input::get('email');        
        $u->roles = Input::get('roles');        
        $u->password = bcrypt(Input::get('password'));        
        $u->save();

        $user_email = $u->email;    
        $userid = $u->id;       
        $p = new Profile;
        DB::table('profile')->insert(
                [
                    'userid' => $userid,
                    'username' => $user_email
            ]);


        Session::flash('success_msg','The User Was Successfully Added!');
        return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $args=array();
        $user = User::find($id);      
        $args['roles'] = Roles::all()->pluck('role_name', 'id');  
        if($user){
            $args['user']=$user;
            return View('Admin_Panel.Users.edit')->with($args);
        } 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [            
            'name' => 'required|max:20',
            'email' => 'required',            
            'roles' => 'required|numeric'
        ]);
        $u = User::find($id);
        if ($u!=null)
        {
        $u->name = Input::get('name');
        $u->roles = Input::get('roles');
        $u->email = Input::get('email');        
        if(!empty(Input::get('password'))) {
            $u->password = bcrypt(Input::get('password'));           
        }        
        $u->save();
        return redirect('admin/users');
        }        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        

        $user_delete = User::destroy($id);
        $user_profile_delete = Profile::where('profile.userid','=',$id)->delete();      
        Session::flash('success_msg','The User Was successfully Deleted');
        return back();
    }

}
