<?php

namespace App\Http\Controllers;

use App\Models\Occupant;
use App\Http\Resources\OccupantResource;
use App\Http\Requests\StoreOccupantRequest;
use App\Http\Requests\UpdateOccupantRequest;

class OccupantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $occupants = Occupant::all();
        $message = 'Occupants retrieved successfully';

        if ($occupants->count() < 1) {
            $message = 'No occupants found';
        }
        return OccupantResource::collection($occupants)
            ->additional(['message' => $message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOccupantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOccupantRequest $request)
    {
        $occupant = Occupant::create($request->validated());
        return  OccupantResource::make($occupant)
            ->additional(['message' => 'Occupant created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function show(Occupant $occupant)
    {
        return OccupantResource::make($occupant)
            ->additional(['message' => 'Occupant retrieved successfully']);
    }

    public function showPayments(Occupant $occupant)
    {
        $payment = $occupant->payments()->get();
        if ($payment->count() < 1) {
            return response()->json([
                'message' => 'No payments found',
            ], 404);
        }
        return OccupantResource::make($payment)
            ->additional(['message' => "Payments of $occupant->name retrieved successfully"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOccupantRequest  $request
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOccupantRequest $request, Occupant $occupant)
    {
        $occupant->update($request->validated());
        return OccupantResource::make($occupant)
            ->additional(['message' => 'Occupant updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Occupant  $occupant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupant $occupant)
    {
        $occupant->delete();
        return OccupantResource::make($occupant)
            ->additional(['message' => 'Occupant deleted successfully']);
    }
}
