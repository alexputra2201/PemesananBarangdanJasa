<?php

namespace App\Http\Controllers;

use App\Models\PemesananBarang;
use App\Models\PemesananJasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoryUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('showHistory',[
            'pemesananjasas' => PemesananJasa::where('user_id', auth()->user()->id)->get(),
            'pemesanandesign' => PemesananJasa::where('jasa_id', 1)-> where('user_id', auth()->user()->id)->get(),
            'pemesanankonstruksi' => PemesananJasa::where('jasa_id', 2)-> where('user_id', auth()->user()->id)->get(),
            'pemesananbarangs' => PemesananBarang::where('product_id', 1)-> where('user_id', auth()->user()->id)->get(),
            'rovinaresidences' => PemesananBarang::where('product_id', 2)-> where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(PemesananJasa $pemesananJasa, $id)
    {
        return view('showedithistory',[
            'pemesananjasa' => $pemesananJasa::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemesananJasa $pemesananJasa, $id)
    {
        $findId = PemesananJasa::find($id);

        $findId->bukti_transaksi_pelunasan = $request->input('bukti_transaksi_pelunasan');
        
        if ($request->file('bukti_transaksi_pelunasan')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $findId->bukti_transaksi_pelunasan = $request->file('bukti_transaksi_pelunasan')->store('bukti_transaksi_pelunasan-images');
        }

        $findId->save(); 

       

        return redirect('/history')->with('success', 'Harap Menunggu 7 Hari Kerja');
    }

}