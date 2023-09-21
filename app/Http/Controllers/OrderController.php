<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('customer')->get();
        foreach($orders as $order){
            //$order['customer'] = Customer::find($order['customer_id'])->name;
            $order['creationDate'] = Carbon::createFromFormat('Y-m-d', $order['creationDate'])->format('d/m/Y');
        }
        return view('order.index', [
            'orders'=> $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($customer_id)
    {
        $editables = [
            ['Amount', 'Enter amount', 'number'],
            ['VTAamount', '20%', 'number']
        ];
        return view('order.create', [
            'editables'=>$editables,
            'customer_id' => $customer_id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        if($request->vtaamount===null){
            $request->vtaamount = $request->amount*0.2;
        }
        $order = Order::create([
            'amountET' => $request->amount,
            'amountVTA' => $request->vtaamount,
            'reference' => 'FR'.rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9),
            'creationDate' => now(),
            'customer_id' => $request->customer_id,
        ]);
        return redirect(route('customer.show', $request->customer_id));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $order['creationDate'] = Carbon::createFromFormat('Y-m-d', $order['creationDate'])->format('D d/m/Y');
        return view('order.show', [
            'order'=>$order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
