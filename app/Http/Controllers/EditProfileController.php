<?php

namespace App\Http\Controllers;

use App\Models\editProfile;
use Illuminate\Http\Request;

class editProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editProfiles = editProfile::all();
        return view('editProfile.index', ['editProfiles' => $editProfiles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editProfiles = editProfile::pluck('caption', 'id');
        return view('editProfile.create', compact('editProfiles'));
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
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'picture' => 'required'
        ]);

        editProfile::create($request->all());
        return redirect('/editProfile')->with('success', 'editProfile Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\editProfile  $editProfile
     * @return \Illuminate\Http\Response
     */
    public function show(editProfile $editProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\editProfile  $editProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(editProfile $editProfile)
    {
        $editProfiles = editProfile::pluck('caption', 'id');
        return view('editProfile.edit', ['editProfile' => $editProfile, 'editProfiles' => $editProfiles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\editProfile  $editProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, editProfile $editProfile)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'password' => 'required',
            'picture' => 'required'
        ]);

        $editProfile->update($request->all());
        return redirect('/editProfile')->with('success', 'editProfile Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\editProfile  $editProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(editProfile $editProfile)
    {
        $editProfile->delete();
        return redirect('/editProfile')->with('success', 'editProfile deleted');
    }
}
