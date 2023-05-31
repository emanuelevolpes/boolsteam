<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Developer;
use App\Http\Requests\StoreDeveloperRequest;
use App\Http\Requests\UpdateDeveloperRequest;
use Illuminate\Support\Str;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = Developer::all();

        return view('admin.developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.developers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeveloperRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeveloperRequest $request)
    {
        $data = $request->validated();
        $new_developer = new Developer();
        $new_developer->fill($data);

        $new_developer->slug = Str::slug($new_developer->name, '-');

        $new_developer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function show(Developer $developer)
    {
        return view('admin.developers.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function edit(Developer $developer)
    {
        return view('admin.developers.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeveloperRequest  $request
     * @param  \App\Models\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeveloperRequest $request, Developer $developer)
    {
        $data = $request->validated();
        $developer->slug = Str::slug($developer->name, '-');
        $developer->update($data);

        return to_route('admin.developers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Developer  $developer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();
        return to_route('admin.developers.index');
    }
}
