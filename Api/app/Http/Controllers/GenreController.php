<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Http\Requests\StoreGenreRequest;
use App\Http\Requests\UpdateGenreRequest;
use App\Http\Resources\GenreCollection;
use App\Http\Resources\GenreResource;
use Ramsey\Uuid\Type\Integer;
use Illuminate\Http\Request;

class GenreController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
    // return Genre::all();
    // return new GenreCollection(Genre::all());
    $number = $request->query('number');
    if ($number) {
      return new GenreCollection(Genre::paginate($number));
    }
    return new GenreCollection(Genre::paginate());
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
   * @param  \App\Http\Requests\StoreGenreRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreGenreRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Genre  $genre
   * @return \Illuminate\Http\Response
   */
  public function show(Genre $genre)
  {

    return new GenreResource($genre->loadMissing('books'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Genre  $genre
   * @return \Illuminate\Http\Response
   */
  public function edit(Genre $genre)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateGenreRequest  $request
   * @param  \App\Models\Genre  $genre
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateGenreRequest $request, Genre $genre)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Genre  $genre
   * @return \Illuminate\Http\Response
   */
  public function destroy(Genre $genre)
  {
    //
  }
}