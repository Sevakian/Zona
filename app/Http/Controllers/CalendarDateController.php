<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalendarDateRequest;
use App\Http\Resources\ResponseResource;
use App\Models\CalendarDate;

class CalendarDateController extends Controller
{
    public function store(CalendarDateRequest $request): ResponseResource
    {
        return new ResponseResource(CalendarDate::create($request->validated()));
    }

    public function update(CalendarDateRequest $request, CalendarDate $calendarDate): ResponseResource
    {
        $calendarDate->update($request->validated());

        return new ResponseResource($calendarDate);
    }

    /**
     * @return bool|null
     */
    public function destroy(CalendarDate $calendarDate)
    {
        return $calendarDate->delete();
    }
}
