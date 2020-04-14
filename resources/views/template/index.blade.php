@extends('template/layout/layout')
@section('content')
        <!DOCTYPE html>

<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3 class="text-muted"><a href="{{URL::to('')}}/admin" style="text-decoration: none;color: #0288d1">Login as Admin</a></h3>
            <div class="card img-fluid" style="width:500px">
                <a href="#">
                    <img class="card-img-top" src="{{ asset('img/work.svg') }}" width="200px" height="200px">
                </a>
                <div class="card-img-overlay">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="text-muted"><a href="{{URL::to('')}}/client" style="text-decoration: none;color: #0288d1">Login as Client</a></h3>
            <div class="card img-fluid" style="width:500px">
                <a href="#">
                    <img class="card-img-top" src="{{ asset('img/user.svg') }}" width="200px" height="200px">
                </a>
                <div class="card-img-overlay">
                </div>
            </div>
        </div>
    </div>

</div>

@stop
