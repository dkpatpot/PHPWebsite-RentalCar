<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarOfferResource;
use App\Models\CarOffer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CarOfferController extends Controller
{
    public function index()
    {
        $car_offers = CarOffer::get();
        return CarOfferResource::collection($car_offers);
    }

    public function store(Request $request)
    {
        $car_offer = new CarOffer();
        $car_offer->cus_firstname = $request->get('cus_firstname');
        $car_offer->cus_lastname = $request->get('cus_lastname');
        $car_offer->cus_email = $request->get('cus_email');
        $car_offer->cus_phone = $request->get('cus_phone');
        $car_offer->car_brand = $request->get('car_brand');
        $car_offer->car_model = $request->get('car_model');
        $car_offer->car_year = $request->get('car_year');
        $car_offer->car_color = $request->get('car_color');
        $car_offer->car_mileage = $request->get('car_mileage');
        if ($car_offer->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Car offer created successfully with ID: ' . $car_offer->id,
                'car_offer_id' => $car_offer->id
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'success' => false,
            'message' => 'Car offer created failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    public function show(CarOffer $car_offer)
    {
        return new CarOfferResource($car_offer);
    }

    public function update(Request $request, CarOffer $car_offer)
    {
        if ($request->has('cus_firstname')) $car_offer->cus_firstname = $request->get('cus_firstname');
        if ($request->has('cus_lastname')) $car_offer->cus_lastname = $request->get('cus_lastname');
        if ($request->has('cus_email')) $car_offer->cus_email = $request->get('cus_email');
        if ($request->has('cus_phone')) $car_offer->cus_phone = $request->get('cus_phone');
        if ($request->has('car_brand')) $car_offer->car_brand = $request->get('car_brand');
        if ($request->has('car_model')) $car_offer->car_model = $request->get('car_model');
        if ($request->has('car_year')) $car_offer->car_year = $request->get('car_year');
        if ($request->has('car_color')) $car_offer->car_color = $request->get('car_color');
        if ($request->has('car_mileage')) $car_offer->car_mileage = $request->get('car_mileage');
        if ($request->has('offer_status')) $car_offer->offer_status = $request->get('offer_status');
        if ($request->has('car_total_displacement')) $car_offer->car_total_displacement = $request->get('car_total_displacement');
        if ($request->has('car_fuel_type')) $car_offer->car_fuel_type = $request->get('car_fuel_type');
        if ($request->has('car_drive_system')) $car_offer->car_drive_system = $request->get('car_drive_system');
        if ($request->has('car_transmission')) $car_offer->car_transmission = $request->get('car_transmission');
        if ($car_offer->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Car offer updated successfully with ID: ' . $car_offer->id,
                'car_offer_id' => $car_offer->id
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => 'Car offer updated failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarOffer $car_offer)
    {
        
    }
}
