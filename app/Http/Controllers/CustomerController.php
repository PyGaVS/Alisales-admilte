<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
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
            ['Name', 'Enter name'],
            ['Address', 'Enter address'],
            ['Postalcode', 'Enter postal code'],
            ['City', 'Enter city'],
            ['Mail', 'Enter mail'],
            ['Website', 'Enter url']
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
        $customer= Customer::create([
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
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.show', [
            'customer'=>$customer
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        $editables = [
            ['Name', 'Enter name', $customer->name],
            ['Address', 'Enter address', $customer->address],
            ['Postalcode', 'Enter postal code', $customer->postalCode],
            ['City', 'Enter city', $customer->city],
            ['Mail', 'Enter mail', $customer->email],
            ['Website', 'Enter url', $customer->url]
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
