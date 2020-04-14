<?php

namespace App\Http\Controllers;

use App\Book;
use App\RackTable;
use Illuminate\Http\Request;
use services\rack\BooksRepository;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $booksRepository = new BooksRepository();
        return $booksRepository->index($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('template/pages/books/add-books')->with(["rackId" => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $bookTitle = $request->title;
            $bookAuthor = $request->authorName;
            $publishedYear = $request->publishedYear;
            $booksRepository = new BooksRepository();
            return $booksRepository->store($bookTitle, $bookAuthor, $publishedYear, $id);
        } catch (\Exception $exception) {
            return ('There is a system problem right now and we are unable to process your request.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
