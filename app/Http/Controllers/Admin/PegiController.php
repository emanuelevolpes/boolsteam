<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePegiRequest;
use App\Http\Requests\UpdatePegiRequest;
use App\Models\Pegi;

class PegiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegis = Pegi::all();
        return view('admin.pegis.index',compact('pegis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePegiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePegiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegi  $pegi
     * @return \Illuminate\Http\Response
     */
    public function show(Pegi $pegi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegi  $pegi
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegi $pegi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePegiRequest  $request
     * @param  \App\Models\Pegi  $pegi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePegiRequest $request, Pegi $pegi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegi  $pegi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegi $pegi)
    {
        //
    }
}
