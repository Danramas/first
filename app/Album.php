<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function preview()
    {
        if($preview = $this->photos()->first()){
            return "/storage/images/".$preview->img;
        }
    }
    protected $table='albums';

    protected $fillable = ['album_name', 'user_id'];
}
