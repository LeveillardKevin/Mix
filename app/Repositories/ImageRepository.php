<?php

namespace App\Repositories;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageRepository
{
    public function store($request)
    {
       // Sauvegarde de l'image
        $path = basename($request->image->store('images'));

        // Sauvegarde dans le dossier thumb
        $image = InterventionImage::make($request->image)->widen(500)->encode();
        Storage::put('thumbs/' . $path, $image);

        // Sauvegarde dans la base de donnée
        $image = new Image();
        $image->description = $request->description;
        $image->category_id = $request->category_id;
        $image->name = $path;
        $request->user()->images()->save($image);
    }
}