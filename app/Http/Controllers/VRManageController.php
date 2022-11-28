<?php

namespace App\Http\Controllers;

use App\Models\VR;
use Illuminate\Http\Request;

class VRManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.vrs.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vr  $vr
     * @return \Illuminate\Http\Response
     */
    public function show(VR $vr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vr  $vr
     * @return \Illuminate\Http\Response
     */
    public function edit(VR $vr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VR  $vr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VR $vr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VR  $vr
     * @return \Illuminate\Http\Response
     */
    public function destroy(VR $vr)
    {
        //
    }
}
