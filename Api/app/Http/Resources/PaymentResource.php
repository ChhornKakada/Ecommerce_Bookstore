<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'paymentMethodId' => $this->payment_mothod_id,
            'cardholderName' => $this->cardholder_name,
            // 'cardNumber' => $this->card_number,
            'email' => $this->email,
            // 'month' => $this->month,
            // 'year' => $this->year,
            // 'cvv' => $this->cvv,

            // 'author' => new AuthorResource($this->whenLoaded('author')),
            // 'genre' => new GenreResource($this->whenLoaded('genre')),

            // // 'field' => new ClassResource($this->whenLoaded('function in this class'))
            // 'imgs' => new BookImageResource($this->whenLoaded('bookImage'))
          //   'imgs' => $bookImage ? $bookImage->toArray() : [],
          ];
    }
}
