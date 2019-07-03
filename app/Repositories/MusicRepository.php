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

    public function getMusicsForCategory($slug)
    {
        return Music::latestWithUser()->whereHas('category', function ($query) use($slug) {
            $query->whereSlug($slug);
        })->paginate(config('app.pagination'));
    }

    public function getMusicForUser($id)
    {
        return Music::latestWithUser()->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->paginate(config('app.pagination'));
    }

}