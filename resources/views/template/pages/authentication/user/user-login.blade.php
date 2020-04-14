@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <h2>User Login</h2>
    <form action="{{URL::to('')}}/client/login" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control w-50" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control w-50" id="pwd" placeholder="Enter password" name="password">
        </div>
        @if(!empty($error))
            <div class="text-danger">{{$error}}</div>
        @endif
        <div><a href="{{URL::to('')}}/signup" class="mt-2">Signup here</a></div>
        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>
@stop
