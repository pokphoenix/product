<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;


class OrderController extends Controller
{
    private $view = 'order';
    private $title = 'Order';
    private $route = 'order';
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
        $tables = Order::from('ops_order as o')
                ->join('mas_customer as mc','o.CustomerCode','mc.CustomerCode')
                ->join('ops_orderdetail as ord','ord.OrderCode','o.OrderCode')
                ->join('mas_products as mp','ord.ProductCode','mp.ProductCode')
                ->select(DB::raw('o.OrderCode,o.OrderDate,mp.ProductName,mc.FistName,mc.LastName,mc.IDCrad,ord.QTY,o.IsActive'))
                ->get();

        return view($this->view.'.index',compact('tables','title','route'));
    }

    public function create(){
        $title = $this->title ;
        $route = $this->route ;
        $action = url($route);

        $customers = Customer::where('IsActive',1)->get();
        $products = Product::where('IsActive',1)->get();

        return view($this->view.'.create',compact('title','route','action','customers','products'));
    }

    public function store(Request $request){
        $post = $request->all();
        $validator = $this->validator($post);
        if ($validator->fails()) {
            return redirect()->back()
                ->withError($validator->errors())->withInput();
        }

        $order['OrderCode'] = Order::GetID() ;
        $order['CustomerCode'] = $post['customer_id'];
        $order['OrderDate'] = Carbon::now();
        $order['IsActive'] = isset($post['is_active']) ? 1 : 0 ;
        Order::create($order);

        $product['OrderCode'] = $order['OrderCode'];
        $product['ProductCode'] = $post['product_id'];
        $product['QTY'] = $post['amount'];
        $orderId = OrderDetail::create($product);

        return redirect($this->route)->with('success','Create Success');
    }

    public function edit($id){
        $title = $this->title ;
        $route = $this->route;
        $edit = true;
        $action = url($route."/$id");

        $customers = Customer::where('IsActive',1)->get();
        $products = Product::where('IsActive',1)->get();

        $data = Order::from('ops_order as o')
                ->where('o.OrderCode',$id)
                ->join('ops_orderdetail as ord','ord.OrderCode','o.OrderCode')
                ->select(DB::raw('o.OrderCode,o.CustomerCode,ord.ProductCode,ord.QTY,o.IsActive'))
                ->first();
        return view($this->view.'.create',compact('title','route','edit','action','data','customers','products'));
    }

    public function update(Request $request,$id){
        $post = $request->all();
        $validator = $this->validator($post);
        if ($validator->fails()) {
            return redirect()->back()
                ->withError($validator->errors())->withInput();
        }


        $order['CustomerCode'] = $post['customer_id'];
        $order['OrderDate'] = Carbon::now();
        $order['IsActive'] = isset($post['is_active']) ? 1 : 0 ;
        Order::where('OrderCode',$id)->update($order);

        $product['ProductCode'] = $post['product_id'];
        $product['QTY'] = $post['amount'];
        $orderId = OrderDetail::where('OrderCode',$id)->update($product);


       
        return redirect($this->route)->with('success','Update Success');
    }

    public function destroy(Request $request,$id){
        OrderDetail::where('OrderCode',$id)->delete();
        Order::where('OrderCode',$id)->delete();
       
        return redirect($this->route)->with('success','Delete Success');
    }

    public function active(Request $request,$id){
        $order = Order::where('OrderCode',$id)->first();
        $isActive = 1 ;
        if ($order->IsActive){
            $isActive = 0 ;
        }
        Order::where('OrderCode',$id)->update(['IsActive'=>$isActive]);
        return redirect($this->route)->with('success','Update Success');
    }
    
     private function validator($data)
    {
        return Validator::make($data, [
            'product_id' => 'required|string',
            'customer_id' => 'required|string',
            'amount' => 'required|string|max:100'
            
        ]);
    }
}
