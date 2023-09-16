@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <nobr>
    <h1 class="m-0 text-dark">{{__('Orders')}}</h1>
    </nobr>
@stop

{{-- Setup data for datatables --}}
@php
    $heads = [
        __('Name'),
        __('Date'),
        __('Customer'),
        'Total',
        ['label' => 'Actions', 'width' => 15]
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
                                  striped hoverable beautify>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{$order['reference']}}</td>
                                <td>{{$order['creationDate']}}</td>
                                <td><a href="{{route('customer.show', $order['customer_id'])}}">{{$order['customer']->name}}</a></td>
                                <td>{{number_format($order['amountET'] + $order['amountVTA'], 2, ',', ' ')}}€</td>
                                <td><nobr>
                                        <!-- SHOW -->
                                        <a class="btn btn-xs btn-default text-teal mx-1 shadow" href="{{route('order.show', $order['id'])}}">
                                            <i class="fa fa-lg fa-fw fa-eye"></i>
                                        </a>

                                        <a class="btn btn-xs btn-default text-primary mx-1 shadow" href="#">
                                            <i class="fa fa-lg fa-fw fa-pen"></i>
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
