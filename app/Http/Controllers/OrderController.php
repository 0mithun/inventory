<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\Product;
use Illuminate\Http\Request;

use DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageName = "Orders";
        $orders = Order::all();

   

        return view('backend.orders.index', compact('pageName','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageName = 'Order Create';

        $users = User::all();

        return view('backend.orders.create', compact('pageName', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
                'order_type'    =>  ['required'],
                'receipt_name'    =>  ['required'],
                'address'    =>  ['required'],
                'email'    =>  ['required'],
                'city'    =>  ['required'],
                'state'    =>  ['required'],
                'zip_code'    =>  ['required'],
                'phone'    =>  ['required'],
                'country'    =>  ['required'],
                'product_name'    =>  ['required'],
                'quantity'    =>  ['required'],
        ]);
            $data = [
                'order_type'    =>  $request->order_type,
                'receipt_name'    =>  $request->receipt_name,
                'address'    =>  $request->address,
                'email'    =>  $request->email,
                'city'    =>  $request->city,
                'state'    =>  $request->state,
                'zip_code'    =>  $request->zip_code,
                'phone'    =>  $request->phone,
                'country'    =>  $request->country,
                'product_id'    =>  $request->product_name,
                'quantity'    =>  $request->quantity,
                'status'    =>  1,
                'label_type'    =>  'ShipBob Labels',
                'delivery_method'   =>  'Parcel',
                'ship_option'       =>  'Standard'
            ];
        
            auth()->user()->orders()->create($data);

            // session()->flash('succes', "Order create successfully");

            // return redirect()->route('orders.index');


            session()->flash('succes','Order Create Successfully');

            return redirect()->route('orders.index');

        //return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function getProduct(Request $request){
        $data = [];

        if($request->q){
            $search = $request->q;
            $data = DB::table("products")
                    //->select("id","name")
                    ->where('user_id', auth()->user()->id)
            		->where('name','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }

    public function getProductById(Request $request){
         // return $request->all();
         $product = Product::find($request->id);

         return response()->json($product );
    }

    public function getUser(Request $request){
        $data = [];


        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("users")
            		->select("id","name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }

    public function getProductbySearch(Request $request){
       
        $data = [];

        if($request->q){
            $search = $request->q;
            $data = DB::table("products")
                    //->select("id","name")
                    //->where('user_id', auth()->user()->id)
                    ->where('send_inventory',1)
            		->where('name','LIKE',"%$search%")
            		->get();
        }


        return response()->json($data);
    }


    public function getUserById(Request $request){
        
        // return $request->all();
        $user = User::find($request->id);

        return response()->json($user );
    }
    
}
