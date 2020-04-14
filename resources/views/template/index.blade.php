@extends('template/layout/layout')
@section('content')
        <!DOCTYPE html>

<br>
<div class="container">
    <div class="d-flex flex-wrap mt-4" style="width: 655px; margin: auto;">
        <div class="mt-2" style="padding: 30px; background: white">
            <h3 class="text-muted"><a href="{{URL::to('')}}/admin" style="text-decoration: none;color: #0288d1">Login as Admin</a></h3>
        </div>
        <div class="ml-5 mt-2" style="padding: 30px; background: white">
            <h3 class="text-muted"><a href="{{URL::to('')}}/client" style="text-decoration: none;color: #0288d1">Login as Client</a></h3>
        </div>
    </div>

</div>
<script>
    if(localStorage.hasOwnProperty('role')){
       window.location.href = `{{env('APP_URL')}}/racks`;
    }else{

    }
</script>
@stop
