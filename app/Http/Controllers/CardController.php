<?php

namespace App\Http\Controllers;

use App\Http\Services\CardService;
use App\Models\Card;
use App\Http\Requests\StoreCardRequest;
use App\Http\Requests\UpdateCardRequest;
use App\Repositories\Interfaces\CardRepositoryInterface;

class CardController extends Controller
{
    protected $cardService;
    protected $cardRepository;
    public function __construct(CardService $cardService,CardRepositoryInterface $cardRepository)
    {
        $this->cardService = $cardService;
        $this->cardRepository = $cardRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCardRequest $request)
    {
        $card = $this->cardRepository->store($request);
        return response()->json($card, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Card $card)
    {
        //
    }
}
