<?php

namespace App\Http\Resources\WebApi;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        switch ($request->route()->action['as']) {
            case 'web.products.index':
            case 'web.products.store': 
                return [
                    'id' => $this->id,
                    'name' => $this->name,
                    'category_id' => $this->category_id,
                    'category_name' => optional($this->category)->name,
                    'created_at' => $this->created_at
                        ? $this->created_at->format(config('const.format_date')) 
                        : '',
                    'profile' => asset($this->profile)
                ];
            break;
            default: return parent::toArray($request);
        }
        
    }
}
