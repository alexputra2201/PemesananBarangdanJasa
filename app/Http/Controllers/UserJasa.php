<?php

namespace App\Http\Controllers;

use App\Models\PemesananJasa;
use App\Models\Project;
use App\Models\Product;
use App\Models\Jasa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PHPUnit\Framework\Constraint\IsTrue;

class UserJasa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product',[
            'pemesananjasas' => PemesananJasa::all(),
            'projects' => Project::all(),
            'project' => Project::distinct()->get(['nama_project']),
            'products' => Product::all(),
            'jasa' => Jasa::all()
            
        ]);
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
        return view('pemesananjasa',[
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
            'image' => 'image|file|max:4096',
            'deskripsi' => 'required',
            'bukti_transaksi' => 'required|image|file|max:4096',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['nama_lengkap'] = auth()->user()->nama_lengkap;

        $validatedData['dp'] = 100000;
        
        if ($request->file('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('jasauser-images');
        }

        if ($request->file('bukti_transaksi')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['bukti_transaksi'] = $request->file('bukti_transaksi')->store('bukti_transaksi-images');
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
        return view('dashboard.jasa.showjasa',[
            'pemesananjasa' => $pemesananJasa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemesananJasa  $pemesananJasa
     * @return \Illuminate\Http\Response
     */
    public function edit(PemesananJasa $pemesananJasa,$id)
    {
        return view('dashboard.jasa.jasaedit',[
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
    public function update(Request $request, $id)
    {
     
        $findId = PemesananJasa::find($id);

        //mengecek apakah total harga null atau tidak
        if($findId->total_harga == null || $findId->status == null){

            $findId->total_harga = $request->input('total_harga')-$findId->dp;
            $findId->image_develop = $request->input('image_develop');
            $findId->status = $request->input('status');  
        } else {
            
            $findId->status = $request->input('status');        
            
        }
        
        if ($request->file('image_develop')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $findId->image_develop = $request->file('image_develop')->store('image_develop-images');
        }
        $findId->save(); 
        
        //return $findId;

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
