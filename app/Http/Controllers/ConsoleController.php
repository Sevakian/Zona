<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsoleRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Console;

class ConsoleController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ResponseResource::collection(Console::all());
    }

    public function store(ConsoleRequest $request): ResponseResource
    {
        return new ResponseResource(Console::create($request->validated()));
    }

    public function update(ConsoleRequest $request, Console $console): ResponseResource
    {
        $console->update($request->validated());

        return new ResponseResource($console);
    }
}
