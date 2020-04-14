@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <div class="float-left">
        <h2><a href="{{URL::to('')}}/racks" style="text-decoration: none">All Racks {{$role}}</a></h2>
    </div>
    {{--@if($role == 1)--}}
    <div>
        <a href="{{URL::to('')}}/add/new/rack" class="btn float-right mr-4 new-rack-btn-color">Add New Rack</a><br>
    </div>
    {{--@endif--}}
    <div class="row col-md-12 custyle">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
            </tr>
            </thead>
            @foreach($racks as $rack)
            <tr>
                <td>{{$rack->id}}</td>
                <td><a href="{{URL::to('')}}/racks/{{$rack->id}}/books">{{$rack->name}}</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@stop
