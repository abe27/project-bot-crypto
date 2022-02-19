<?php

namespace App\Http\Controllers\Sanctum;

use App\Models\Order;
use App\Http\Resources\OrderResoure;
use App\Models\OrderType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $data = Order::where('is_active', true)->paginate();
        return $this->sendResponse(OrderResoure::collection($data), 'Order fetched.', 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'trend_id' => 'required',
            'order_type_id' => 'required',
            'orderno' => 'required',
            'hashno' => 'required',
            'price' => 'required',
            'total_coin' => 'required',
            'fee' => 'required',
            'type' => 'required',
            'status' => 'required',
            'is_active' => 'required',
        ]);

        if ($v->fails())
        {
            return $this->sendError($v->errors(), 'Invalid Required', 202);
        }

        $order = Order::where('orderno', $request->orderno)->where('hashno', $request->hashno)->first();
        if (!$order) {
            $order_type_id = OrderType::where('title', $request->order_type_id)->first();
            $order = new Order();
            $order->user_id = $request->user()->id;
            $order->trend_id = $request->trend_id;
            $order->order_type_id = $order_type_id->id;
            $order->orderno = $request->orderno;
            $order->hashno = $request->hashno;
            $order->price = $request->price;
            $order->total_coin = $request->total_coin;
            $order->fee = $request->fee;
            $order->type = $request->type;
            $order->status = $request->status;
            $order->is_active = $request->is_active;
            $order->save();
        }

        return $this->sendResponse(new OrderResoure($order), 'Order created.', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
