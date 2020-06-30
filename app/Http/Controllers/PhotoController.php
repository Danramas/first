<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Resources\PhotoResource;
use App\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index()
    {
        return PhotoResource::collection(Photo::all());
    }

    public function show(Photo $photo)
    {
        return new PhotoResource($photo);
    }
}
