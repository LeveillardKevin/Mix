<?php

namespace App\Repositories;

use App\Models\Music;

class MusicRepository
{
    public function store($request)
    {
        // Sauvegarder la musique
        $path = basename($request->music->store('musics'));

        $music = new Music();
        $music->artiste = $request->artiste;
        $music->category_id = $request->category_id;
        $music->name = $path;
        $request->user()->musics()->save($music);
    }

    public function getAllMusics()
    {
        return Music::latestWithUser()->paginate(config('app.pagination'));
    }


}