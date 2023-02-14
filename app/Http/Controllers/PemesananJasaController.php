<?php

namespace App\Http\Controllers;

use App\Models\PemesananJasa;

use App\Models\Project;
use App\Models\Product;
use App\Models\Jasa;
use App\Http\Requests\StorePemesananJasaRequest;
use App\Http\Requests\UpdatePemesananJasaRequest;

use Illuminate\Support\Facades\Storage;

class PemesananJasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product',[
            'projects' => Project::all(),
            'project' => Project::distinct()->get(['nama_project']),
            'products' => Product::all(),
            'jasa' => Jasa::all(),
            'pemesananjasas' => PemesananJasa::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemesananjasa',[
            'jasas' => Jasa::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemesananJasaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemesananJasaRequest $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'jasa_id' => 'required',
            'email' => ['required', 'email:dns'],
            'no_hp' => 'required|numeric',
            'image' => 'image|file|max:4096',
            'deskripsi' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('jasauser-images');
        }

        PemesananJasa::create($validatedData);

        return redirect('/product')->with('success', 'Apply successfull! Please waiting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function show(PemesananJasa $pemesananJasa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(PemesananJasa $pemesananJasa)
    {
        return view('dashboard.jasa.jasaedit',[
            'pemesananjasa' => $pemesananJasa,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananJasaRequest  $request
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananJasaRequest $request, PemesananJasa $pemesananJasa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemesananJasa $pemesananJasa)
    {
        //
    }
}
