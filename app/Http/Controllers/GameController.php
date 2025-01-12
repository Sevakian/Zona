<?php

namespace App\Http\Controllers;

use App\Http\Requests\GameRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ResponseResource::collection(Game::all());
    }

    public function store(GameRequest $request): ResponseResource
    {
        return new ResponseResource(Game::create($request->validated()));
    }

    public function update(GameRequest $request, Game $game): ResponseResource
    {
        $game->update($request->validated());

        return new ResponseResource($game);
    }
}
