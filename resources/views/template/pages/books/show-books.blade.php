@extends('template/layout/layout')
@section('content')<br>
<div class="container">
    <div class="float-left">
        <h2>{{$rackName}}</h2>
    </div>
    <div>
        <a href="{{URL::to('')}}/racks/{{$rackId}}/books/create" class="btn float-right mr-4 new-rack-btn-color">Add New Books</a><br>
    </div>
    <div class="row col-md-12 custyle">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
            </tr>
            </thead>
            @foreach($booksData as $books)
                <tr>
                    <td>{{$books->id}}</td>
                    <td>{{$books->title}}</td>
                    <td>{{$books->author}}</td>
                    <td>{{$books->published_year}}</td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
@stop
