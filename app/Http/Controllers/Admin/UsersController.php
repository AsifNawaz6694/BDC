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
use App\Roles;
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
        $args = array();
        $args['users'] = User::all();  
        return view('Admin_Panel.Users.create')->with($args);
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
        Session::flash('success','The User Was Successfully Added!');
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
            'password' => 'required',
            'roles' => 'required|numeric'
        ]);
       $u = User::find($id);
       if ($u!=null)
       {
        $u->name = Input::get('name');
        $u->roles = Input::get('roles');
        $u->email = Input::get('email');        
        $u->password = Input::get('password');        
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
        /*$user_delete->destroy();*/
        Session::flash('success_msg','The User Was successfully Deleted');
        return back();
    }

}
