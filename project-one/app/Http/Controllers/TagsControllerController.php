<?php

namespace App\Http\Controllers;

use App\Models\TagsController;
use Illuminate\Http\Request;

class TagsControllerController extends Controller
{
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
        return view('tags/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new TagsController();

        $tag->title = request('title');

        $tag->user_id = Auth::user()->id;

        $tag->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TagsController  $tagsController
     * @return \Illuminate\Http\Response
     */
    public function show(TagsController $tagsController)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TagsController  $tagsController
     * @return \Illuminate\Http\Response
     */
    public function edit(TagsController $tagsController)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TagsController  $tagsController
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TagsController $tagsController)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TagsController  $tagsController
     * @return \Illuminate\Http\Response
     */
    public function destroy(TagsController $tagsController)
    {
        //
    }
}
