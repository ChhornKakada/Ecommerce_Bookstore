<?php

namespace App\Services;

use Illuminate\Http\Request;

class ApiService {

  // Example: this mean 'name' only allowed operator 'equal to'
  // and 'postalCode' has multiple operator 'equal to', 'greater than' and 'litte than'
  protected $safeParms = [];


  // Map the parameter in the db
  // means that 'postalCode' equals to 'postal_code'
  protected $columnMap = [];

  // Map the operator above
  protected $operatorMap = [];


  // function "transform" that the parameter is the request
  // The purpose of this method is to transform the request data into an array of query conditions.
  public function transform(Request $request) {
    $eloQuery = [];

    /*
      example: ($this->safeParms as address => ['eq'])
               ($this->safeParms as postalCode => ['eq', 'gt', 'lt'])
    */
    foreach ($this->safeParms as $parm => $operators) {

      /*
      This line retrieves the value of the current parameter from the request object using the query() method. It assigns the value to the $query variable.
       */
      $query = $request->query($parm);

      /* This conditional check ensures that if the current parameter is not set in the request, the loop will move to the next iteration using the continue statement. */
      if(!isset($query)) {
        continue;
      }


      /* This line maps the parameter name to its corresponding column name using the $columnMap property. If no mapping is found, it defaults to the original parameter name. */
      $column = $this->columnMap[$parm] ?? $parm;


      foreach ($operators as $operator) {
        // if the current operator exists as a key in the $query array.
        if (isset($query[$operator])) {
          // this line adds a new item to the $eloQuery array
          // meaning: $eloQuery[] = ['name', '=', 'John'];
          //          $eloQuery = [ ['name', '=', 'John'] ]; // add new ele in array

          $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
        }
      }
    }
    return $eloQuery;
  }

}
