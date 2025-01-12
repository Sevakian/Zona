<?php

namespace App\Http\Controllers;

use App\Http\Requests\TimestatDateRequest;
use App\Http\Resources\ResponseResource;
use App\Models\TimestatDate;

class TimestatDateController extends Controller
{
    public function store(TimestatDateRequest $request): ResponseResource
    {
        return new ResponseResource(TimestatDate::create($request->validated()));
    }

    public function update(TimestatDateRequest $request, TimestatDate $timestatDate): ResponseResource
    {
        $timestatDate->update($request->validated());

        return new ResponseResource($timestatDate);
    }

    /**
     * @return bool|null
     */
    public function destroy(TimestatDate $timestatDate)
    {
        return $timestatDate->delete();
    }
}
