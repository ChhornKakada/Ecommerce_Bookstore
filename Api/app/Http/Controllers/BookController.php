<?php

namespace App\Http\Controllers;

use App\Services\BookService;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use Illuminate\Http\Request;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    $filter = new BookService();
    $filterItems = $filter->transform($request); // [['column], 'operation', 'value']

    $number = $request->query('number');
    $isLatest = $request->query('isLatest');
    $books = Book::where($filterItems);
    if ($isLatest) {
      $books = $books->orderBy('id', 'desc');
    }

    if ($number) {
      return new BookCollection($books->paginate($number)->appends($request->query()));
    }
    return new BookCollection($books->paginate()->appends($request->query()));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreBookRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreBookRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function show(Book $book)
  {
    return new BookResource($book->loadMissing('author')->loadMissing('genre'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function edit(Book $book)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateBookRequest  $request
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateBookRequest $request, Book $book)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Book  $book
   * @return \Illuminate\Http\Response
   */
  public function destroy(Book $book)
  {
    //
  }

  public function searchByAuthor(Request $request)
  {
    $authorName = $request->input('author_name');

    $books = Book::select('*')
      ->with([
        'author'
      ])
      ->whereHas('author', function ($query) {
        global $authorName;
        $query->where('fullname', 'like', '%' . $authorName . '%');
      })
      ->get();

    // Return the search results to a view or as JSON response
    return response()->json($books, 200);
  }
}
