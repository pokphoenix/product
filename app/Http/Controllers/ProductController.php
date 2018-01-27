<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;


class ProductController extends Controller
{
    private $view = 'product';
    private $title = 'Product';
    private $route = 'product';
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function index(){

        $title = $this->title ;
        $route = $this->route ;
        $tables = Product::all();
        return view($this->view.'.index',compact('tables','title','route'));
    }

    public function create(){
        $title = $this->title ;
        $route = $this->route ;
        $action = url($route);
        return view($this->view.'.create',compact('title','route','action'));
    }

    public function store(Request $request){
        $post = $request->all();
        $validator = $this->validator($post);
        if ($validator->fails()) {
            return redirect()->back()
                ->withError($validator->errors())->withInput();
        }
    
        $customer['ProductCode'] = Product::GetID() ;
        $customer['ProductName'] = $post['product_name'];
        $customer['ProductDescription'] = $post['product_description'];
        $customer['IsActive'] = 1;
        Product::create($customer);
        return redirect($this->route)->with('success','Create Success');
    }

    public function edit($id){
        $title = $this->title ;
        $route = $this->route;
        $edit = true;
        $action = url($route."/$id");
        $data = Product::where('ProductCode',$id)->first();
        return view($this->view.'.create',compact('title','route','edit','action','data'));
    }

    public function update(Request $request,$id){
        $post = $request->all();
        $validator = $this->validator($post);
        if ($validator->fails()) {
            return redirect()->back()
                ->withError($validator->errors())->withInput();
        }

        $customer['ProductName'] = $post['product_name'];
        $customer['ProductDescription'] = $post['product_description'];
        $customer['IsActive'] = 1;

        Product::where('ProductCode',$id)->update( $customer);
      


       
        return redirect($this->route)->with('success','Update Success');
    }

    public function destroy(Request $request,$id){
        Product::where('ProductCode',$id)->delete();
       
        return redirect($this->route)->with('success','Delete Success');
    }

    
     private function validator($data)
    {
        return Validator::make($data, [
            'product_name' => 'required|string|max:100',
            'product_description' => 'required|string|max:100'
        ]);
    }
}
