@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Add order')}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
                    <div class="card card-primary card-outline">
                        <x-forms.form method="post" action="{{route('order.store')}}">
                            @foreach($editables as $editable)
                                <div class="form-group">
                                    <label for="{{strtolower($editable[0])}}">{{__($editable[0])}}</label>
                                    <input type="number" step="0.01" class="form-control" id="{{strtolower($editable[0])}}" placeholder="{{$editable[1]}}"
                                           name="{{strtolower($editable[0])}}">
                                </div>
                            @endforeach

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="customer_id" value="{{$customer_id}}">
                                </div>
                        </x-forms.form>

                    </div>
            <img class="img" src="img/image.jpg" alt="" width=500px />
        </div>
    </div>
@stop
