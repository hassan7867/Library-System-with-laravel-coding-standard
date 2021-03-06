@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <div class="float-left">
        <h2><a href="{{URL::to('')}}/racks" style="text-decoration: none">All Racks</a></h2>
    </div>
    <button id="getRole" onclick="getRole({{$role ?? ''}})" style="display: none"></button>
    <div id="addnewRack">
        <a href="{{URL::to('')}}/add/new/rack" class="btn float-right mr-4 new-rack-btn-color">Add New Rack</a><br>
    </div>
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
<script>
    document.getElementById('getRole').click();
    function getRole(role){
        if(!localStorage.hasOwnProperty('role')){
            if(role === 1 || role === 2){
                localStorage.setItem('role', role);
            }else{
                window.location.href = `{{env('APP_URL')}}`
            }
        }
        if(localStorage.getItem('role') === '2'){
            document.getElementById('addnewRack').style.display = 'none';
        }
    }
</script>
@stop
