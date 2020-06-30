<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Http\Requests\StoreAttachmentRequest;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(StoreAttachmentRequest $request)
    {
        $file = $request->attachment;
        $filename = uniqid() . '_' . str_replace(' ', '_', $file->getClientOriginalName());
        $path = Storage::disk('public')->putFileAs('images', $file, $filename);

        if (Storage::disk('public')->exists($path)) {

            $attachment = new Photo;
            $attachment->photo_name = $request->photo_name;
            $attachment->album_id = $request->album_id;
            $attachment->img = $filename;

            $attachment->save();

            return response()->json([
                'message' => 'Attachment has been successfully uploaded.',
            ]);
        } return response()->json([
        'message' => 'Attachment has not been uploaded.',
    ]);
    }
}
