<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\PhotoResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlbumRequest;

class AlbumController extends Controller
{
    public function index()
    {
        return AlbumResource::collection(Album::all());

    }

    public function show(Album $album)
    {
        return $album;
    }

    public function idPhoto(Album $album)
    {
        return PhotoResource::collection($album->photos);
    }

    public function create(Request $request)
    {

    }

    public function store(StoreAlbumRequest $request)
    {
        $album = new Album;
        $album->album_name = $request->album_name;
        $album->user_id = $request->user_id;

        $album->save();
        return response()->json([
            'message' => 'GOOOD',
        ]);
    }
}
