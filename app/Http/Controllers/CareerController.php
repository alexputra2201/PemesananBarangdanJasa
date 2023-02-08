<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\ResponseCareer;
use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;


class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('career',[
            'careers' => Career::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createCareer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCareerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCareerRequest $request)
    {

        if(auth()->guest()){
            return redirect('/login');
        }
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => ['required', 'email:dns', 'unique:users'],
            'cv' => 'file|max:1024',
            'berkas_lain' => 'file|max:1024',
            'no_hp' => 'integer|size:10'
        ]);

        if ($request->file('surat_lowongan_kerja')) {
            $validatedData['surat_lowongan_kerja'] = $request->file('surat_lowongan_kerja')->store('surat_lowongan_kerja');
        }
        if ($request->file('cv')) {
            $validatedData['cv'] = $request->file('cv')->store('cv');
        }
        if ($request->file('berkas_lain')) {
            $validatedData['berkas_lain'] = $request->file('berkas_lain')->store('berkas_lain');
        }

        $validatedData['user_id'] = auth()->user()->id;

        ResponseCareer::create($validatedData);

        return redirect('/career')->with('success', 'Apply successfull! Please waiting');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCareerRequest  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        //
    }
}
