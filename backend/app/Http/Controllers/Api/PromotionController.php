<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PromotionResource;
use App\Models\Promotion;
use App\Models\PromotionCode;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::get();
        return PromotionResource::collection($promotions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotion = new Promotion();
        $promotion->name = $request->get('name');
        $promotion->detail = $request->get('detail');
        $promotion->discount_type = $request->get('discount_type');
        $promotion->percent = $request->get('percent');
        $promotion->is_active = $request->get('is_active');
        $promotion->amount = $request->get('amount');
        $promotion->total_amount = $request->get('total_amount');
        if ($promotion->save()) {
            for ($i = 0; $i < $promotion->total_amount; $i++) {
                $promotionCode = new PromotionCode();
                $promotionCode->code = $promotion->id . fake()->lexify("?????");
                $promotion->promotionCodes()->save($promotionCode);
            }

            return response()->json([
                'success' => true,
                'message' => 'Promotion saved successfully with id ' . $promotion->id,
                'promotion_code' => $promotion->id
            ], Response::HTTP_CREATED);
        }
        return response()->json([
            'success' => false,
            'message' => 'Promotion saved failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        $promotionCodes = $promotion->promotionCodes;
        return new PromotionResource($promotion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        if ($request->has('name')) $promotion->name = $request->get('name');
        if ($request->has('detail')) $promotion->detail = $request->get('detail');
        if ($request->has('discount_type'))  $promotion->discount_type = $request->get('discount_type');
        if ($request->has('percent'))  $promotion->percent = $request->get('percent');
        if ($request->has('amount'))  $promotion->amount = $request->get('amount');
        if ($request->has('is_active'))  $promotion->is_active = $request->get('is_active');
        if ($promotion->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Promotion updated successfully with id ' . $promotion->id,
                'promotion_id' => $promotion->id
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => 'Promotion saved failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $name = $promotion->name;
        if ($promotion->delete()) {
            return response()->json([
                'success' => true,
                'message' => "Promotion {$name} deleted successfully"
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => "Promotion {$name} deleted failed"
        ], Response::HTTP_BAD_REQUEST);
    }

    public function search(Request $request) {
        $q = $request->query('q');
        $promotions = Promotion::where('name', 'LIKE', "%{$q}%")
                         ->orWhere('detail', 'LIKE', "%{$q}%")
                         ->get();
        return $promotions;
    }
}
