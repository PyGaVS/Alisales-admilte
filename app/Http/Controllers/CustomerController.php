<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $customers = Auth::user()->customers;
        return view('customer.index', [
            'customers'=> $customers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $editables = [
            ['Name', 'Enter name', 'text'],
            ['Address', 'Enter address', 'text'],
            ['Postalcode', 'Enter postal code', 'text'],
            ['City', 'Enter city', 'text'],
            ['Mail', 'Enter mail', 'email'],
            ['Website', 'Enter url', 'url']
        ];
        return view('customer.create', [
            'editables'=>$editables
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        Customer::create([
            'name' => $request->name,
            'address' => $request->address,
            'postalCode' => $request->postalcode,
            'city' => $request->city,
            'email' => $request->mail,
            'url' => $request->website,
            'user_id' => Auth::user()->id,
        ]);
        return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        $heads = [
            __('Reference'),
            __('Date'),
            'Total',
            ['label' => 'Actions', 'width' => 15]
        ];

        $config["lengthMenu"] = [ 10, 50, 100, 420, 500];

        $orders = $customer->orders;

        foreach($orders as $order){
            //$order['customer'] = Customer::find($order['customer_id'])->name;
            $order['creationDate'] = Carbon::createFromFormat('Y-m-d', $order['creationDate'])->format('d/m/Y');
        }

        return view('customer.show', [
            'customer'  => $customer,
            'heads'     => $heads,
            'config'    => $config,
            'orders'    => $orders
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $editables = [
            ['Name', 'Enter name', $customer->name, 'text'],
            ['Address', 'Enter address', $customer->address, 'text'],
            ['Postalcode', 'Enter postal code', $customer->postalCode, 'text'],
            ['City', 'Enter city', $customer->city, 'text'],
            ['Mail', 'Enter mail', $customer->email, 'email'],
            ['Website', 'Enter url', $customer->url, 'url']
        ];
        return view('customer.edit', [
            'customer'=>$customer,
            'editables'=>$editables
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->update([
            'name' => $request->name,
            'address' => $request->address,
            'postalCode' => $request->postalcode,
            'city' => $request->city,
            'email' => $request->mail,
            'url' => $request->website
        ]);
        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
