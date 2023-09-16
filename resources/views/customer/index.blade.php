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
        ['label' => __('Address')],
        ['label' => __('Postal code'), 'width' => 11],
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
                                <td>{{$customer['address']}}</td>
                                <td>{{$customer['postalCode']}}</td>
                                <td>{{$customer['url']}}</td>
                                <td><nobr>
                                        <!-- EDIT -->
                                        <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="{{route('customer.edit', $customer['id'])}}">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
                                        </a>

                                        <!-- DELETE -->
                                        <a class="btn btn-xs btn-default text-danger mx-1 shadow" href="{{route('customer.destroy', $customer['id'])}}">
                                            <i class="fa fa-lg fa-fw fa-trash"></i>
                                        </a>

                                        <!-- SHOW -->
                                        <a class="btn btn-xs btn-default text-teal mx-1 shadow" href="{{route('customer.show', $customer['id'])}}">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>
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
