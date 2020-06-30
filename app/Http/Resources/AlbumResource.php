<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlbumResource extends JsonResource
{
    public function toArray($request)
    {
        return ['id'=>$this->id,
            'album_name'=>$this->album_name,
            'preview'=>$this->preview(),
            ];
    }
}
