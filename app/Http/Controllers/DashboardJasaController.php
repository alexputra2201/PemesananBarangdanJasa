<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\PemesananJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardJasaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.jasa.index',[
            'jasas' => Jasa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jasa' => 'required|max:255',
            'image' => 'image|file|max:4096',
            'deskripsi' => 'required'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('jasa-images');
        }

        Jasa::create($validatedData);

        return redirect('/dashboard/jasas')->with('success', 'New Jasa has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa)
    {
        return view('dashboard.jasa.show', [
            'jasa' => $jasa,
            'pemesananjasas' => PemesananJasa::Where('jasa_id', $jasa->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function edit(Jasa $jasa)
    {
        return view('dashboard.jasa.edit', [
            'jasa' => $jasa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jasa $jasa)
    {
        $validatedData = $request->validate([
            'nama_jasa' => 'required|max:255',
            'image' => 'image|file|max:4096',
            'deskripsi' => 'required'
        ]);

        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('jasa-images');
        }

        Jasa::where('id', $jasa->id)
            ->update($validatedData);

            return redirect('/dashboard/jasas')->with('success', 'Jasa has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jasa  $jasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jasa $jasa)
    {
        Jasa::destroy($jasa->id);

        return  redirect('/dashboard/jasas')->with('success', 'Jasa has been deleted!');
    }
}