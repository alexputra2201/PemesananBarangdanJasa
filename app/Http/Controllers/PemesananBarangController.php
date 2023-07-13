<?php

namespace App\Http\Controllers;

use App\Models\PemesananBarang;
use App\Models\Product;
use App\Models\Kursi;
use App\Http\Requests\StorePemesananBarangRequest;
use App\Http\Requests\UpdatePemesananBarangRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
        $product = Product::all();
        if(auth()->guest()){
            return redirect('login');
        }
        return view('kursi',[
            'products' => $product,
            'kursis' => Kursi::where('product_id', '1')->get(),
            'kursis2' => Kursi::where('product_id', '2')->get(),
            // 'kursis' => Kursi::where('product_id', $product->id)
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
        DB::beginTransaction();

    //     try {
    //         // Tambahkan data pemesanan barang ke tabel 'pemesananbarang'
    //         $pemesanan = PemesananBarang::create([
    //             'email' => $request->input('email'),
    //             'no_hp' => $request->input('no_hp'),
    //             'kredit' => $request->input('kredit'),
    //             'product_id' => $request->input('product_id'),
    //             'kursi_id' => $request->input('kursi_id')
    //         ]);

    //         if($pemesanan['kredit'] == "no")
    //         {
    //             $pemesanan['bank'] = $request->input('null');
    //         }
    //         else{
    //             $pemesanan['bank'] = $request->input('bank');
    //         }

    //         if ($request->file('booking_fee')) {
    //             $pemesanan['booking_fee'] = $request->file('booking_fee')->store('booking_fee');
    //         }

    //         if ($request->file('syaratpengambilanrumah')) {
    //             $pemesanan['syaratpengambilanrumah'] = $request->file('syaratpengambilanrumah')->store('syaratpengambilanrumah');
    //         }

    //         if ($request->file('syaratkpr')) {
    //             $pemesanan['syaratkpr'] = $request->file('syaratkpr')->store('syaratkpr');
    //         }

    //         if ($request->file('formaplikasikprmandiri')) {
    //             $pemesanan['formaplikasikprmandiri'] = $request->file('formaplikasikprmandiri')->store('formaplikasikprmandiri');
    //         }
            
    //         if ($request->file('formaplikasikprbtn')) {
    //             $pemesanan['formaplikasikprbtn'] = $request->file('formaplikasikprbtn')->store('formaplikasikprbtn');
    //         }

    //         $pemesanan['user_id'] = auth()->user()->id;
    //         $pemesanan['nama_lengkap'] = auth()->user()->nama_lengkap;

            
            
    
    //         // Update status kursi menjadi booked (false) di tabel 'kursi'
    //         // $kursi = Kursi::find($request->input('kursi_id'));
    //         // $kursi->booked = false;
    //         // $kursi->save();
    
    //         DB::commit();
    
    //         // Operasi berhasil, lakukan pengalihan atau tampilkan pesan sukses
    //         return redirect()->back()->with('success', 'Pemesanan berhasil dan kursi berhasil diperbarui.');
    //     //    return dd($pemesanan); 
    //     } catch (\Exception $e) {
    //         DB::rollback();
    
    //         // Terjadi kesalahan, lakukan pengalihan atau tampilkan pesan error
    //         return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan pemesanan dan memperbarui kursi.');
    //     }
    // }

        

        $validatedData = $request->validate([
            'email' => ['required', 'email:dns'],
            'no_hp' => 'required|numeric',
            'kredit' => 'required',
            'product_id' => 'required',
            'kursi_id' => 'required'
        ]);

        if($validatedData['kredit'] == "no")
        {
            $validatedData['bank'] = $request->input('null');
        }
        else{
            $validatedData['bank'] = $request->input('bank');
        }

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
        $validatedData['tanggal'] = null;

        PemesananBarang::create($validatedData);

          // Update status kursi menjadi booked (false) di tabel 'kursi'
            $kursi = Kursi::find($request->input('kursi_id'));
            $kursi->tersedia = false;
            $kursi->save();
    
        DB::commit();

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
        // $findId->tanggal = Carbon::parse($request->tanggal)->format('Y-m-d H:i:s');
        $findId->tanggal = Carbon::parse($request->input('tanggal'))->format('Y-m-d H:i:s');
        $findId['serahterimakunci'] = $request->file('serahterimakunci')->store('serahterimakunci');
        
        // if ($request->file('serahterimakunci')) {
        //     $findId->serahterimakunci = $request->file('serahterimakunci')->store('serahterimakunci');
        // }
        
        // $findId->tanggal = $request->input('tanggal')->format('Y-m-d H:i:s');
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