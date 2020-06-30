<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index()
    {
        $albums=Album::all();
        return view('search', ['albums'=>$albums]);
    }

    public function photos(Request $request)
    {
        $data = Photo::all()->where('album_id', $request->id)->get();
        return response()->json($data);
    }

    public function searching(Request $request)
    {
        $photo_id = null;
        if (!empty($request->album_id)) {
            $photos = Photo::where('album_id', $request->album_id)->select('id')->get();
            $photo_id = Photo::whereIN('photo_id', $photos)->select('id')->get();
        }

        if (!empty($request->photo_id)) {
            $photo_id = Photo::where('photo_id', $request->photo_id)->select('id')->get();
        }

        if ($request->checkImage == 0) {
            $sign = '=';
        } else {
            $sign = '!=';
        }

        $getPhotos = Photo::all()
            ->where('img', $sign, null)
            ->when($photo_id, function ($query, $photo_id) {
                return $query->whereIN('photo_id', $photo_id);
            })
            ->get();


        $photos=[];
        foreach ($getPhotos as $photo) {
            $photos[] = [
                'id'=>$photo->id,
                'album_name'=>$photo->album->album_name,
            ];
        }
        return response()->json($photos);
    }
}
