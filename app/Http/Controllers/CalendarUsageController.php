<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarUsageRequest;
use App\Http\Resources\ResponseResource;
use App\Models\CalendarUsage;

class CalendarUsageController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ResponseResource::collection(CalendarUsage::all());
    }

    public function store(CalendarUsageRequest $request): ResponseResource
    {
        return new ResponseResource(CalendarUsage::create($request->validated()));
    }

    public function update(CalendarUsageRequest $request, CalendarUsage $calendarUsage): ResponseResource
    {
        $calendarUsage->update($request->validated());

        return new ResponseResource($calendarUsage);
    }

    /**
     * @return bool|null
     */
    public function destroy(CalendarUsage $calendarUsage)
    {
        return $calendarUsage->delete();
    }
}
