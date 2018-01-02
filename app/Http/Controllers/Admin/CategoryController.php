<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;
use Session;
use Auth;
use App\Category;

class CategoryController extends Controller
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
        $args['category'] = Category::all();                        
        return view('Admin_Panel.Category.index')->with($args);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin_Panel.Category.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:20',
            'description' => 'required',        
            'symbol' => 'required',
            'color_code' => 'required'
        ]);
        $c = new Category;                
        $category_exist = Category::where('symbol', '=', Input::get('symbol'))->first();       
        if (empty($category_exist) && $category_exist == '') {
        $c->name = Input::get('name');  
        $c->description = Input::get('description');
        $c->symbol = Input::get('symbol'); 
        $c->color_code = Input::get('color_code');
        $c->save();
        }else{
           Session::flash('err_message','The Symbol Already Exist For Another Category!'); 
        }        
        Session::flash('success','The Category Was Successfully Added!');
        return redirect('admin/category');
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
        $category = Category::find($id);
        if($category){
            $args['category']=$category;
            return View('Admin_Panel.Category.edit')->with($args);
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
            'description' => 'required',            
            'symbol' => 'required',
            'color_code' => 'required'
        ]);
        $u = Category::find($id);
        if ($u!=null)
        {
        $u->name = Input::get('name');
        $u->description = Input::get('description');
        $u->symbol = Input::get('symbol');
        $u->color_code = Input::get('color_code');
        $u->save();
        return redirect('admin/category');
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
        $category_delete = Category::destroy($id);        
        Session::flash('success_msg','The Category Was successfully Deleted');
        return back();
    }

}
