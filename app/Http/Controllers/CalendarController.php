<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarRequest;
use App\Http\Resources\ResponseResource;
use App\Models\Calendar;
use Spatie\QueryBuilder\QueryBuilder;

class CalendarController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ResponseResource::collection(Calendar::all());
    }

    public function store(CalendarRequest $request): ResponseResource
    {
        return new ResponseResource(Calendar::create($request->validated()));
    }

    public function show(Calendar $calendar): ResponseResource
    {
        $calendarWithDates = QueryBuilder::for(Calendar::where('id', $calendar->id))
            ->allowedIncludes(['calendarDates'])
            ->first();

        return new ResponseResource($calendarWithDates);
    }

    public function update(CalendarRequest $request, Calendar $calendar): ResponseResource
    {
        $calendar->update($request->validated());

        return new ResponseResource($calendar);
    }
}
