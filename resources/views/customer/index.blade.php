@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <nobr><div style="
    display:flex;
    justify-content: space-between;
    ">
    <h1 class="m-0 text-dark">{{__('Customers')}}</h1>
    <a type="button" class="btn btn-primary" href="{{route('customer.create')}}">
        <i style="margin-right: 10px;" class="fas fa-plus fa-lg"></i>{{__('Add customer')}}</a>
    </div>
    </nobr>
@stop

{{-- Setup data for datatables --}}
@php
    $heads = [
        __('Name'),
        ['label' => __('Address'), 'width' => 35],
        //['label' => __('Postal code'), 'width' => 11],
        ['label' => __('Website')],
        ['label' => 'Actions', 'width' => 12]
    ];

    $config["lengthMenu"] = [ 10, 50, 100, 420, 500];

@endphp
@section('plugins.Datatables', true)
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {{-- fill data using the component slot --}}
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="light" :config="$config"
                                  striped hoverable with-footer footer-theme="dark" beautify>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer['name']}}</td>
                                <td style="position: relative;"><x-address>{{$customer['address']}}</x-address></td>
                                <td>{{$customer['url']}}</td>
                                <td><nobr>
                                        <x-button.edit route="customer.edit">{{$customer->id}}</x-button.edit>
                                        <x-button.delete route="customer.destroy">{{$customer->id}}</x-button.delete>
                                        <x-button.show route="customer.show">{{$customer->id}}</x-button.show>
                                    </nobr>
                                </td>
                            </tr>
                            @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
