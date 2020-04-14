@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <h2>Add New Rack</h2>
    <form action="{{URL::to('')}}/racks" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Name:</label>
            <input type="text" class="form-control w-50"  placeholder="Enter name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
