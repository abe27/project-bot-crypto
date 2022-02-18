<?php

namespace App\Http\Controllers\Sanctum;

use App\Models\Trend;
use App\Http\Resources\TrendOnTimeResource;
use App\Http\Resources\TrendResource;
use App\Models\Asset;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Exchange;
use App\Models\TimeFrame;
use App\Models\TrendOnTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TrendController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $data = Trend::where('is_active', true)->paginate();
        return $this->sendResponse(
            TrendResource::collection($data),
            'Trends fetched',
            200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'asset_id' => 'required',
            'exchange_id' => 'required',
            'currency_id' => 'required',
            'trend' => 'required',
            'last_price' => 'required',
            'last_percent' => 'required',
        ]);

        if ($valid->fails()) {
            return $this->sendError($valid->errors(), 'Error Required', 202);
        }

        $asset = Asset::where('symbol', $request->asset_id)->first();
        if (!$asset) {
            $category = Category::where('title', 'Other')->first();
            $asset = new Asset();
            $asset->category_id = $category->id;
            $asset->symbol = $request->asset_id;
            $asset->description = 'New Coin';
            $asset->image_url = $request->$asset->is_active = true;
            $asset->save();
        }

        $exchange = Exchange::where('name', $request->exchange_id)->first();
        $currency = Currency::where('currency', $request->currency_id)->first();

        $db = Trend::where('exchange_id', $exchange->id)
            ->where('asset_id', $asset->id)
            ->where('currency_id', $currency->id)
            ->first();

        if (!$db) {
            $db = new Trend();
            $db->asset_id = $asset->id;
            $db->exchange_id = $exchange->id;
            $db->currency_id = $currency->id;
            $db->trend = $request->trend;
            $db->last_price = $request->last_price;
            $db->last_percent = $request->last_percent;
            $db->open_order = false;
            $db->is_active = true;
            $db->save();
        } else {
            $db->asset_id = $asset->id;
            $db->exchange_id = $exchange->id;
            $db->currency_id = $currency->id;
            $db->trend = $request->trend;
            $db->last_price = $request->last_price;
            $db->last_percent = $request->last_percent;
            $db->open_order = false;
            $db->is_active = true;
            $db->save();
        }

        return $this->sendResponse(
            new TrendResource($db),
            'Api Data created.',
            201
        );
    }

    public function store_timeframe(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'asset' => 'required',
            'currency' => 'required',
            'on_time' => 'required',
            'trend' => 'required',
        ]);

        if ($valid->fails()) {
            return $this->sendError($valid->errors(), 'Error Required', 202);
        }

        $asset = Asset::where('symbol', $request->asset)->first();
        $currency = Currency::where('currency', $request->currency)->first();
        $on_time = TimeFrame::where('value', $request->on_time)->first();

        $db = Trend::where('asset_id', $asset->id)
            ->where('currency_id', $currency->id)
            ->first();

        $timeFrame = TrendOnTime::where('trend_id', $db->id)
            ->where('time_frame_id', $on_time->id)
            ->first();

        if (!$timeFrame) {
            $timeFrame = new TrendOnTime();
            $timeFrame->trend_id = $db->id;
            $timeFrame->time_frame_id = $on_time->id;
            $timeFrame->trend = $request->trend;
            $timeFrame->save();
        }

        return $this->sendResponse(
            new TrendOnTimeResource($timeFrame),
            'Api Data created.',
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trend $trend)
    {
        return $this->sendResponse(
            new TrendResource($trend),
            'Api Data show.',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trend $trend)
    {
        $valid = Validator::make($request->all(), [
            'trend' => 'required',
            'last_price' => 'required',
            'last_percent' => 'required',
        ]);

        if ($valid->fails()) {
            return $this->sendError($valid->errors(), 'Error Required', 202);
        }

        $trend->trend = $request->trend;
        $trend->last_price = $request->last_price;
        $trend->last_percent = $request->last_percent;
        $trend->open_order = false;
        $trend->is_active = true;
        $trend->save();

        return $this->sendResponse(
            new TrendResource($trend),
            'Api Data updated.',
            201
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trend $trend)
    {
        return $this->sendResponse($trend->delete(), 'Api Data deleted.', 204);
    }
}
