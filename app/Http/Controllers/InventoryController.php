<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Product;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $pageName = 'Check Inventory';
        $inventories = Inventory::all();

        return view('backend.products.checkinventory', compact('inventories','pageName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $user = auth()->user();

        $request->validate([
            'shipping_type'                             =>  ['required'],
            'inventory_configure'                       =>  ['required'],
            'quantity_to_send'                          =>  ['required'],
            'quantity_of_box'                           =>  ['required'],
            'quantity_per_box'                          =>  ['required'],
            'estimated_date_of_arrival_shipment'        =>  ['required'],
            'send_to_location'                          =>  ['required'],
        ]);

        $inventorys = [];
        $i = 0;
        //$inventory_id = uniqid('inventory_');

        $inventory = Inventory::create([
            'shipping_type'                         =>  $request->shipping_type,
            'send_to_location'                      =>  $request->send_to_location,
            'inventory_configure'                   =>  $request->inventory_configure,
            'estimated_date_of_arrival_shipment'    =>  $request->estimated_date_of_arrival_shipment,
        ]);
        
        foreach($request->products as $product){
            

            $productInfo = Product::find($product['id']);



            if($user->id == $productInfo->user_id){
                $inventorys[] = $inventory->inventorydetails()->create([
                    'product_id'                            =>  $product['id'],
                    
                    'quantity_to_send'                      =>  $request->quantity_to_send[$i],
                    'quantity_of_box'                       =>  $request->quantity_of_box[$i],
                    'quantity_per_box'                      =>  $request->quantity_per_box[$i],
                    
                ]);

                $productInfo->send_inventory = 1;
                $productInfo->save();

                $i++;
            }
            
        }

        return response()->json($inventorys);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {   
        
        //$inventories = Inventory::where('inventory_id', $request->inventory_id)->get();

        return response()->json([
            'inventory' => $inventory,
            'inventory_details' => $inventory->inventorydetails
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //return $request->all();
        $inventory = Inventory::find($request->inventory_id);

        $inventory->status = $request->status;
        $inventory->save();

        session()->flash('succes','Inventory status update successfully');
        return redirect()->route('inventory.check');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
