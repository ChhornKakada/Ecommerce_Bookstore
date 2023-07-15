<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Services\ApiService;

class BookService extends ApiService {

  // Example: this mean 'name' only allowed operator 'equal to'
  // and 'postalCode' has multiple operator 'equal to', 'greater than' and 'litte than'
  protected $safeParms = [
    'title' => ['eq'],
    'isbn' => ['eq'],
    'price' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    'authorId' => ['eq'],
    'genreId' => ['eq'],
    'createdAt' => ['eq', 'lt', 'lte', 'gt', 'gte'],
    'publishedDate' => ['eq', 'lt', 'lte', 'gt', 'gte']
  ];


  // Map the parameter in the db
  // means that 'postalCode' equals to 'postal_code'
  protected $columnMap = [
    'publishedDate' => 'published_date',
    'authorId' => 'author_id',
    'genreId' => 'genre_id',
    'createdAt' => 'created_at'
  ];

  // Map the operator above
  protected $operatorMap = [
    'eq' => '=',
    'lt' => '<',
    'lte' => '<=',
    'gt' => '>',
    'gte' => '>=',
  ];


}
