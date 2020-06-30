<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function way()
    {
        return "/storage/images/".$this->img;
    }

    protected $table='photos';

    protected $fillable = ['photo_name', 'album_id', 'img'];
}
