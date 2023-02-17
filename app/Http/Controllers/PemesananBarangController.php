<?php

namespace App\Http\Controllers;

use App\Models\PemesananBarang;
use App\Models\Product;
use App\Http\Requests\StorePemesananBarangRequest;
use App\Http\Requests\UpdatePemesananBarangRequest;
use Carbon\Carbon;

class PemesananBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemesananbarang',[
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePemesananBarangRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemesananBarangRequest $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email:dns'],
            'no_hp' => 'required|numeric',
            'kredit' => 'required',
            'product_id' => 'required'
        ]);

        if($validatedData['kredit'] == "no")
        {
            $validatedData['bank'] = $request->input('null');
        }
        else{
            $validatedData['bank'] = $request->input('bank');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['nama_lengkap'] = auth()->user()->nama_lengkap;

        PemesananBarang::create($validatedData);

        return redirect('/product')->with('success', 'Apply successfull! Please waiting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemesananBarang  $pemesananBarang
     * @return \Illuminate\Http\Response
     */
    public function show(PemesananBarang $pemesananBarang)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemesananBarang  $pemesananBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(PemesananBarang $pemesananBarang,$id)
    {
        return view('dashboard.products.barangedit',[
            'pemesananbarang' => $pemesananBarang::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePemesananBarangRequest  $request
     * @param  \App\Models\PemesananBarang  $pemesananBarang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananBarangRequest $request, PemesananBarang $pemesananBarang, $id)
    {
        $findId = $pemesananBarang::find($id);
        $findId->tanggal = Carbon::parse($request->date)->format('Y-m-s H:i:s', $request->tanggal);
        $findId->status = $request->input('status');
        $findId->save();

        return redirect('/dashboard/products/')->with('success', 'Data Pemesanan has been updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemesananBarang  $pemesananBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemesananBarang $pemesananBarang)
    {
        //
    }
}