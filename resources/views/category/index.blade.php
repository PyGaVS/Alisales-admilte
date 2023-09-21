@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <nobr>
    <h1 class="m-0 text-dark">{{__('Categories')}}</h1>
    </nobr>
@stop

{{-- Setup data for datatables --}}
@php
    $heads = [
        __('Name'),
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
                    <x-adminlte-datatable id="table1" :heads="$heads" head-theme="dark" theme="warning" :config="$config"
                                  hoverable beautify>
                            @foreach($categories as $category)
                            <tr>
                                <td style="border: none;">{{$category['name']}}</td>
                                <td style="border: none;"><nobr>
                                        <x-button.show route="category.show">{{$category->id}}</x-button.show>
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
