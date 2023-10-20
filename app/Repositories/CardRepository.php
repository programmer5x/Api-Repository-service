<?php

namespace App\Repositories;

use App\Models\Card;
use App\Models\Product;
use App\Repositories\Interfaces\CardRepositoryInterface;

class CardRepository implements CardRepositoryInterface
{
    public function store($request): Card
    {
        $price = Product::find($request->product_id)->price;
        $card = new Card();
        $card->product_id = $request->product_id;
        $card->quantity = $request->quantity;
        $card->totalPrice = $request->quantity * $price;
        $card->customer_id = auth()->user()->id;
        $card->save();
        return $card;
    }

}
