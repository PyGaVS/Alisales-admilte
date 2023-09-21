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
                                <x-forms.input name="{{$editable[0]}}" type="{{$editable[2]}}" placeholder="{{$editable[1]}}" step="0.1"/>
                            @endforeach
                                <x-forms.inputHidden name="customer_id" value="{{$customer_id}}" />
                        </x-forms.form>

                    </div>
            <img class="img" src="img/image.jpg" alt="" width=500px />
        </div>
    </div>
@stop
