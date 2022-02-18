<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrendResource extends JsonResource
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
            'asset' => $this->assets,
            'category' => $this->assets['categories'],
            'exchange' => $this->exchanges,
            'currency' => $this->currencies,
            'trend' => $this->trend,
            'last_price' => $this->last_price,
            'last_percent' => $this->last_percent,
            'open_order' => $this->open_order,
            'on_time_frame' => $this->timeframes,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('d/m/Y H:i:s'),
            'updated_at' => $this->updated_at->format('d/m/Y H:i:s'),
        ];
    }
}
