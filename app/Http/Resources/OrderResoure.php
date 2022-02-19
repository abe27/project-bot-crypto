<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResoure extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'users' => $this->users,
            'trend_id' => $this->trend_id,
            'trends' => $this->trends,
            'order_type_id' => $this->order_type_id,
            'order_types' => $this->order_types,
            'orderno' => $this->orderno,
            'hashno' => $this->hashno,
            'price' => $this->price,
            'total_coin' => $this->total_coin,
            'fee' => $this->fee,
            'trend' => $this->trend,
            'type' => $this->type,
            'status' => $this->status,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
