<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimestatRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Timestat;
use Spatie\QueryBuilder\QueryBuilder;

class TimestatController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ResponseResource::collection(Timestat::all());
    }

    public function store(TimestatRequest $request): ResponseResource
    {
        return new ResponseResource(Timestat::create($request->validated()));
    }

    public function show(Timestat $timestat): ResponseResource
    {
        $timestatWithDates = QueryBuilder::for(Timestat::where('id', $timestat->id))
            ->allowedIncludes(['timestatDates'])
            ->first();

        return new ResponseResource($timestatWithDates);
    }

    public function update(TimestatRequest $request, Timestat $timestat): ResponseResource
    {
        $timestat->update($request->validated());

        return new ResponseResource($timestat);
    }
}
