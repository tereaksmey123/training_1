<?php

namespace App\Http\Resources\MobileApi;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        switch($request->route()->action['as']){
            case 'categories.store':
            case 'categories.index': return [
                'id' => $this->id,
                'code' => $this->code,
                'name' => \App\Libraries\StringLib::slug($this->name)
            ]; break;
            default: return parent::toArray($request);
        }
        


        
    }
}
