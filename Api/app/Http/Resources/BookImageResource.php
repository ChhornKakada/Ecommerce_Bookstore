<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookImageResource extends JsonResource
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
      'front' => $this->front,
      'back' => $this->back,
      'left' => $this->left,
      'inside' => $this->inside
    ];
  }
}
