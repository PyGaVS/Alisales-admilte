<div class="form-group">
<label for="{{strtolower($name)}}">{{__($name)}}</label>
<input type="{{$type}}" class="form-control" id="{{strtolower($name)}}" placeholder="{{__($placeholder)}}"
       name="{{strtolower($name)}}" value="{{$value}}" step="{{$step}}">
</div>
