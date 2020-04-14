<?php

namespace services\rack;

use App\Book;
use App\RackTable;
use DB;
use library_system\books\AuthorName;
use library_system\books\Books;
use library_system\books\Title;
use library_system\rack\Name;

class BooksRepository
{
    public function index($id)
    {
        $rackName = RackTable::where('id', $id)->first()['name'];
        $booksData = Book::where('id_rack', $id)->get();
        return view('template/pages/books/show-books')->with(['rackName' => $rackName, 'booksData' => $booksData, 'rackId' => $id]);
    }

    public function store($bookTitle, $bookAuthor, $publishedYear, $rackId)
    {
        $bookClass = new Books(new Title(new \NonEmptyString($bookTitle)), new AuthorName(new \NonEmptyString($bookAuthor)));
        if (count(Book::where('id_rack',$rackId)->get()) < 5) {
            $books = new Book();
            $books->title = $bookClass->title();
            $books->author = $bookClass->author();
            $books->published_year = $publishedYear;
            $books->id_rack = $rackId;
            $books->save();
            return redirect('racks/' . $rackId . '/books');
        } else {
            return json_encode( 'Only 5 books can be added in a rack');
        }
    }
}
