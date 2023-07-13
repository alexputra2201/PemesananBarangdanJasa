<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kursi;
use App\Models\Product;


class KursiController extends Controller
{
    public function index(Request $request)
{
    $page = $request->query('page', 1);
    $kursis = Kursi::paginate(10, ['*'], 'page', $page); 
    return view('dashboard.kursi.index', compact('kursis'),[
        'products' => Product::all()
    ]);
}


    public function create()
    {
        return view('dashboard.kursi.create',[
            'products' => Product::all()
        ]);
    }

    public function edit(Kursi $kursi)
    {
        return view('dashboard.kursi.edit',[
            'kursi' => $kursi,
            'products' => Product::all()
        ]);
    }

    public function update(Kursi $kursi, Request $request)
    {

       
        $kursi->nomor = $request->input('nomor');
        $kursi->product_id = $request->input('product_id');
        $kursi->save();

        return redirect('/dashboard/kursi/')->with('success', 'Data Pemesanan has been updated!');;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor' => 'required|max:255',
            'product_id' => 'required|max:255',
        ]);


        Kursi::create($validatedData);

        return redirect('/dashboard/kursi')->with('success', 'New Kursi has been added!');
    }
}