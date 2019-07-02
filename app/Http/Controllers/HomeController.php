<?php

namespace App\Http\Controllers;

use App\Repositories\MusicRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MusicRepository $repository)
    {
        $musics = $repository->getAllMusics();
        return view('home', compact('musics'));
    }
}
