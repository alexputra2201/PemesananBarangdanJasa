<?php

namespace App\Http\Controllers;

use App\Models\PemesananJasa;
use App\Models\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardJasaKonstruksi extends Controller
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
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function show(Jasa $jasa, $id)
    {
        return view('dashboard.jasa.showjasakonstruksi',[
            'jasa' => $jasa::find($id),
            'pemesananjasas' => PemesananJasa::Where('jasa_id', $id)->latest()->get(),
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
        return view('dashboard.jasa.jasaeditkonstruksi',[
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
    public function update(Request $request, PemesananJasa $pemesananJasa,$id)
    {
        $findId = PemesananJasa::find($id);
        if($findId->total_harga == null || $findId->status == null){
            $findId->penawaran = $request->input('penawaran');
            $findId->total_harga = $request->input('total_harga');
            $findId->dp = $request->input('total_harga')/2;
            $findId->status = $request->input('status');
        }
        else{
            $findId->status = $request->input('status');
        }
    
        if ($request->file('penawaran')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $findId->penawaran = $request->file('penawaran')->store('penawaran-images');
        }
        if ($request->file('surat_jalan')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $findId->surat_jalan = $request->file('surat_jalan')->store('surat_jalan-images');
        }
        if ($request->file('invoice')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $findId->invoice = $request->file('invoice')->store('invoice-images');
        }
        $findId->save(); 
        return redirect('/dashboard/jasas/')->with('success', 'Data Pemesanan has been updated!');
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