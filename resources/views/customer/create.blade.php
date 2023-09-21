@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Add customer')}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
                    <div class="card card-primary card-outline">

                        <x-forms.form method="post" action="{{route('customer.store')}}">
                            @foreach($editables as $editable)
                                <div class="form-group">
                                    <label for="{{strtolower($editable[0])}}">{{__($editable[0])}}</label>
                                    <input type="text" class="form-control" id="{{strtolower($editable[0])}}" placeholder="{{__($editable[1])}}"
                                           name="{{strtolower($editable[0])}}">
                                </div>
                            @endforeach
                        </x-forms.form>
                    </div>
            <img class="img" src="img/image.jpg" alt="" width=500px />
        </div>
    </div>
@stop
