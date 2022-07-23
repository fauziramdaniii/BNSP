<?php

namespace App\Http\Controllers;

use App\Models\beranda;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    // Untuk menampilkan seluruh halaman

    {
        $berandas = beranda::all();
        return view('beranda.index', ['berandas' => $berandas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    /**
     * untuk create postingan
     */
    {
        $berandas = beranda::pluck('caption', 'id');
        return view('beranda.create', compact('berandas'));
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
            'caption' => 'required',
            'image' => 'required',
            'file' => 'required'
        ]);

        $file_name = null;
        $image_name = null;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $dest = 'image';
            $image_name = $request->name . 'Image Upload' . date("YmdHis") . "." . $image->getClientOriginalExtension();
            $image->move($dest, $image_name);
        }

        if ($request->hasFile('file')) {
            $file = $request->file;
            $dest = 'file';
            $file_name = $request->name . 'File Upload' . date("YmdHis") . "." . $file->getClientOriginalExtension();
            $file->move($dest, $file_name);
        }

        beranda::create([
            'caption' => $request->caption,
            'picture' => $image_name,
            'file' => $file_name,
        ]);
        return redirect('/beranda')->with('success', 'beranda Saved!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function show(beranda $beranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function edit(beranda $beranda)
    {
        $berandas = beranda::pluck('caption', 'id');
        return view('beranda.edit', ['beranda' => $beranda, 'berandas' => $berandas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, beranda $beranda)
    {
        $request->validate([
            'caption' => 'required',
            'picture' => 'required',
            'file' => 'required'
        ]);

        $beranda->update($request->all());
        return redirect('/beranda')->with('success', 'beranda Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\beranda  $beranda
     * @return \Illuminate\Http\Response
     */
    public function destroy(beranda $beranda)
    {
        $beranda->delete();
        return redirect('/beranda')->with('success', 'beranda deleted');
    }
}
