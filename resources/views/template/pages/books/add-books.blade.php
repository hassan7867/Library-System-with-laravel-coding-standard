@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <h2>Add New Book</h2>
    <form action="{{URL::to('')}}/racks/{{$rackId}}/books" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Title:</label>
            <input type="text" class="form-control w-50"  placeholder="Enter name" name="title">
        </div>
        <div class="form-group">
            <label>Author:</label>
            <input type="text" class="form-control w-50"  placeholder="Enter Author Name" name="authorName">
        </div>
        <div class="form-group">
            <label>Published Year:</label>
            <input type="text" class="form-control w-50" name="publishedYear" placeholder="Enter published year">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@stop
