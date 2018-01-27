<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;


class CustomerController extends Controller
{
    private $view = 'customer';
    private $title = 'Customer';
    private $route = 'customer';
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
        $tables = Customer::all();
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
    
        $customer['CustomerCode'] = Customer::GetID() ;
        $customer['FistName'] = $post['first_name'];
        $customer['LastName'] = $post['last_name'];
        $customer['IDCrad'] = $post['id_card'];
        $customer['Tel'] = $post['tel'];
        $customer['IsActive'] = isset($post['is_active']) ? 1 : 0 ;
        Customer::create($customer);
        return redirect($this->route)->with('success','Create Success');
    }

    public function edit($id){
        $title = $this->title ;
        $route = $this->route;
        $edit = true;
        $action = url($route."/$id");
        $data = Customer::where('CustomerCode',$id)->first();
        return view($this->view.'.create',compact('title','route','edit','action','data'));
    }

    public function update(Request $request,$id){
        $post = $request->all();
        $validator = $this->validator($post);
        if ($validator->fails()) {
            return redirect()->back()
                ->withError($validator->errors())->withInput();
        }

        $customer['FistName'] = $post['first_name'];
        $customer['LastName'] = $post['last_name'];
        $customer['IDCrad'] = $post['id_card'];
        $customer['Tel'] = $post['tel'];
        $customer['IsActive'] = isset($post['is_active']) ? 1 : 0 ;



        Customer::where('CustomerCode',$id)->update( $customer);
      


       
        return redirect($this->route)->with('success','Update Success');
    }

    public function destroy(Request $request,$id){
        Customer::where('CustomerCode',$id)->delete();
       
        return redirect($this->route)->with('success','Delete Success');
    }

    public function active(Request $request,$id){
        $customer = Customer::where('CustomerCode',$id)->first();
        $isActive = 1 ;
        if ($customer->IsActive){
            $isActive = 0 ;
        }
        Customer::where('CustomerCode',$id)->update(['IsActive'=>$isActive]);
        return redirect($this->route)->with('success','Update Success');
    }

    
     private function validator($data)
    {
        return Validator::make($data, [
            'id_card' => 'required|string|min:13|max:13',
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'tel' => 'required|string|max:20',
        ]);
    }
}
