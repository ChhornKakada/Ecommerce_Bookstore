<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    // return parent::toArray($request);
    return [
      'id' => $this->id,
      'title' => $this->title,
      'publishedDate' => $this->published_date,
      'imgUrl' => $this->imgUrl,
      'isbn' => $this->isbn,
      'desc' => $this->desc,
      'price' => $this->price,
      'author' => new AuthorResource($this->whenLoaded('author')),
      'genre' => new GenreResource($this->whenLoaded('genre'))
    ];
  }
}
