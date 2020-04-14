@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <h2>Admin Login</h2>
    <form action="/action_page.php">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control w-50" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control w-50" id="pwd" placeholder="Enter password" name="pswd">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
