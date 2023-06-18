<?php

namespace App\Http\Controllers;

use App\Models\Product;

use App\Http\Requests\StorePemesananBarangRequest;

use App\Http\Requests\UpdatePemesananBarangRequest;
use Illuminate\Http\Request;
use App\Models\PemesananBarang;
use Carbon\Carbon;



class PemesananBarang2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->guest()){
            return redirect('login');
        }
        return view('pemesananbarang2',[
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePemesananBarangRequest $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email:dns'],
            'no_hp' => 'required|numeric',
            'kredit' => 'required',
            'product_id' => 'required',
            'booking' => 'required'
        ]);

        if($validatedData['kredit'] == "no")
        {
            $validatedData['bank'] = $request->input('null');
        }
        else{
            $validatedData['bank'] = $request->input('bank');
        }

        // // if ($request->file('formAplikasiKPR')) {
        // //     $validatedData['formaplikasikprmandiri'] = $request->file('formAplikasiKPR')->store('formAplikasiKPR');
        // // }
        // // if ($request->file('lampiranFLPP')) {
        // //     $validatedData['lampiranflppmandiri'] = $request->file('lampiranFLPP')->store('lampiranFLPP');
        // // }
        // // if ($request->file('suratPernyataanKPR')) {
        // //     $validatedData['suratPernyataanKPRmandiri'] = $request->file('suratPernyataanKPR')->store('suratPernyataanKPR');
        // // }
        
        // if ($request->file('btnSyariah')) {
        //     $validatedData['formbtn'] = $request->file('btnSyariah')->store('btnSyariah');
        // }

        if ($request->file('booking_fee')) {
            $validatedData['booking_fee'] = $request->file('booking_fee')->store('booking_fee');
        }

        if ($request->file('syaratpengambilanrumah')) {
            $validatedData['syaratpengambilanrumah'] = $request->file('syaratpengambilanrumah')->store('syaratpengambilanrumah');
        }

        if ($request->file('syaratkpr')) {
            $validatedData['syaratkpr'] = $request->file('syaratkpr')->store('syaratkpr');
        }

        if ($request->file('formaplikasikprmandiri')) {
            $validatedData['formaplikasikprmandiri'] = $request->file('formaplikasikprmandiri')->store('formaplikasikprmandiri');
        }
        
        if ($request->file('formaplikasikprbtn')) {
            $validatedData['formaplikasikprbtn'] = $request->file('formaplikasikprbtn')->store('formaplikasikprbtn');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['nama_lengkap'] = auth()->user()->nama_lengkap;

        PemesananBarang::create($validatedData);

        return redirect('/product')->with('success', 'Apply successfull! Please waiting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePemesananBarangRequest $request, PemesananBarang $pemesananBarang, $id)
    {
        $findId = $pemesananBarang::find($id);
        // $findId->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d H:i:s');
        $findId->tanggal = Carbon::parse($request->input('tanggal'))->format('Y-m-d H:i:s');
        // $findId->tanggal = $request->input('tanggal')->format('Y-m-d H:i:s');
        $findId->status = $request->input('status');
        $findId->save();

        return redirect('/dashboard/products/')->with('success', 'Data Pemesanan has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}