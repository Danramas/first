<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoResource extends JsonResource
{
    public function toArray($request)
    {
        return ['id'=>$this->id,
            'album_id'=>$this->album_id,
            'photo_name'=>$this->photo_name,
            'img'=>$this->way(),
        ];
    }
}
