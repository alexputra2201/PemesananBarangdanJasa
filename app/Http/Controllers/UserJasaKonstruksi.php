<?php

namespace App\Http\Controllers;

use App\Models\PemesananJasa;
use App\Models\Jasa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserJasaKonstruksi extends Controller
{

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
        return view('pemesananjasakonstruksi',[
            'jasas' => Jasa::all(),
            'nama_lengkap' => User::where('id', auth()->user()->id)->get(['nama_lengkap'])
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth()->guest()){
            return redirect('login');
        }
        $validatedData = $request->validate([
            'jasa_id' => 'required',
            'email' => ['required', 'email:dns'],
            'no_hp' => 'required|numeric',
            'image' => 'required|image|file|max:4096',
            'deskripsi' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['nama_lengkap'] = auth()->user()->nama_lengkap;
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('jasakonstruksiuser-images');
        }

        // if ($request->file('bukti_transaksi')) {
        //     if ($request->oldImage) {
        //         Storage::delete($request->oldImage);
        //     }
        //     $validatedData['bukti_transaksi'] = $request->file('bukti_transaksi')->store('bukti_transaksi-images');
        // }

        PemesananJasa::create($validatedData);

        return redirect('/product')->with('success', 'Apply successfull! Please waiting');
    }
}