@extends('adminlte::page')

@section('title', 'Alisales')

@section('content_header')
    <h1 class="m-0 text-dark">{{__('Add order')}}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-6">
                    <div class="card card-primary card-outline">

                        <form method="POST" action="{{route('order.store')}}">
                            @csrf
                            @method("post")
                            <div class="card-body">
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
                                <!--
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                -->
                            </div>

                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>

                    </div>
            <img class="img" src="img/image.jpg" alt="" width=500px />
        </div>
    </div>
@stop
