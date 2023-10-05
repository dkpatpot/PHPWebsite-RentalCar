<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::get();
        return CarResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $car = new Car();
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('/car_images'), $filename);
            $car['image'] = $filename;
        }
        $car->brand = $request->get('brand');
        $car->years = $request->get('years');
        $car->model = $request->get('model');
        $car->color = $request->get('color');
        $car->total_displacement = $request->get('total_displacement');
        $car->mileage = $request->get('mileage');
        $car->fuel_type = $request->get('fuel_type');
        $car->drive_system = $request->get('drive_system');
        $car->transmission = $request->get('transmission');
        $car->type = $request->get('type');
        $car->price = $request->get('price');
        if ($car->save()) {

            $car->car_code =  substr($car->brand, 0, 1) . substr($car->model, 0, 1) .  mt_rand(10000,99999);

            $car->save();
            return response()->json([
                'success' => true,
                'message' => 'Car saved successful with ID: ' . $car->id,
                'car_id' => $car->id
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'success' => false,
            'message' => 'Car saved failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return new CarResource($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        if ($request->has('car_code')) $car->car_code = $request->get('car_code');
        if ($request->has('brand')) $car->brand = $request->get('brand');
        if ($request->has('years')) $car->years = $request->get('years');
        if ($request->has('model')) $car->model = $request->get('model');
        if ($request->has('color')) $car->color = $request->get('color');
        if ($request->has('total_displacement')) $car->total_displacement = $request->get('total_displacement');
        if ($request->has('mileage')) $car->mileage = $request->get('mileage');
        if ($request->has('fuel_type')) $car->fuel_type = $request->get('fuel_type');
        if ($request->has('drive_system')) $car->drive_system = $request->get('drive_system');
        if ($request->has('transmission')) $car->transmission = $request->get('transmission');
        if ($request->has('price')) $car->price = $request->get('price');
        if ($request->has('status')) $car->status = $request->get('status');
        if ($request->has('view_count')) $car->view_count = $request->get('view_count');
        if ($request->has('like_count')) $car->like_count = $request->get('like_count');
        if ($request->has('interest')) $car->interest = $request->get('interest');
        if ($request->has('down_payment')) $car->down_payment = $request->get('down_payment');
        if ($request->has('monthly_payment')) $car->monthly_payment = $request->get('monthly_payment');
        if ($request->has('pay_period')) $car->pay_period = $request->get('pay_period');
        if ($request->has('buy_by')) $car->buy_by = $request->get('buy_by');
        if ($request->has('p_code')) $car->p_code = $request->get('p_code');
        if ($request->has('p_discount')) $car->p_discount = $request->get('p_discount');
        if ($request->has('price_with_vat')) $car->price_with_vat = $request->get('price_with_vat');
        if ($request->has('total_price')) $car->total_price = $request->get('total_price');
        if ($request->has('type')) $car->type = $request->get('type');
        if ($car->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Car updated successful with ID: ' . $car->id,
                'car_id' => $car->id
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => 'Car updated failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car_code = $car->car_code;
        if ($car->delete()) {
            return response()->json([
                'success' => true,
                'message' => "Car {$car_code} deleted successfully"
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => "Car {$car_code} deleted failed"
        ], Response::HTTP_BAD_REQUEST);
    }

    public function search(Request $request) {
        $q = $request->get('q');
        $cars = Car::where('brand', 'LIKE', "%{$q}%")
                    ->orWhere('model', 'LIKE', "%{$q}%")
                    ->orWhere('years', 'LIKE', "%{$q}%")
                    ->get();
        return $cars;
    }
}
