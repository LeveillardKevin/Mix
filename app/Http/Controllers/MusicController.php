<?php

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Repositories\MusicRepository;
use App\Models\User;

class MusicController extends Controller
{
    protected $repository;

    protected $categoryRepository;


    public function __construct(MusicRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->repository = $repository;
    }

    public function user(User $user)
    {
        $musics = $this->musicRepository->getMusicForUser($user->id);
        return view('home', compact('user','musics'));

    }

    public function category($slug)
    {
        $category = $this->categoryRepository->getBySlug($slug);
        $musics = $this->musicRepository->getMusicsForCategory($slug);

        return view('home', compact('category', 'musics'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('musics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'music' => 'required',
           'category_id' => 'required',
           'artiste' => 'nullable|string|max:255',
        ]);

        $this->repository->store($request);

        return redirect()->route('home')->with('ok', __("La music a bien été enregistrée"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
