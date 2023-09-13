@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Dashboard')}}</h1>
@stop

{{-- Setup data for datatables --}}
@php
    $heads = [
        __('Name'),
        ['label' => __('Address')],
        ['label' => __('Postal code'), 'width' => 10],
        ['label' => __('Website')],
        ['label' => 'Actions', 'width' => 12]

    ];

    $config["lengthMenu"] = [ 10, 50, 100, 500];

    $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
                    <i class="fa fa-lg fa-fw fa-pen"></i>
                </button>';
    $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
                      <i class="fa fa-lg fa-fw fa-trash"></i>
                  </button>';
    $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
                       <i class="fa fa-lg fa-fw fa-eye"></i>
                   </button>';


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
                                <td>{!! $btnEdit.$btnDelete.$btnDetails !!}</td>
                            </tr>
                            @endforeach

                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop
