<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PromotionCode;
use Illuminate\Http\Request;
use App\Http\Resources\PromotionCodeResource;
use Illuminate\Http\Response;

class PromotionCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotionCodes = PromotionCode::with('promotion')->paginate(5);
        return PromotionCodeResource::collection($promotionCodes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PromotionCode  $promotionCode
     * @return \Illuminate\Http\Response
     */
    public function show(PromotionCode $promotionCode)
    {
        $promotion = $promotionCode->promotion;
        return new PromotionCodeResource($promotionCode);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PromotionCode  $promotionCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PromotionCode $promotionCode)
    {
        if ($request->has('redeemed_at')) $promotionCode->redeemed_at = $request->get('redeemed_at');
        if ($promotionCode->save()) {
            return response()->json([
                'success' => true,
                'message' => 'Promotion Code updated successfully with id ' . $promotionCode->id
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => 'Promotion code saved failed'
        ], Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PromotionCode  $promotionCode
     * @return \Illuminate\Http\Response
     */
    public function destroy(PromotionCode $promotionCode)
    {
        $code = $promotionCode->code;
        if ($promotionCode->delete()) {
            return response()->json([
                'success' => true,
                'message' => "Promotion Code {$code} deleted successfully"
            ], Response::HTTP_OK);
        }
        return response()->json([
            'success' => false,
            'message' => "Promotion Code {$code} deleted failed"
        ], Response::HTTP_BAD_REQUEST);
    }

    public function search(Request $request) {
        $q = $request->query('q');
        $promotionCodes = PromotionCode::where('code', 'LIKE', "%{$q}%")
            ->paginate(3)->withQueryString();
        return PromotionCodeResource::collection($promotionCodes);
    }
}
