<?php

namespace App\Http\Controllers;

use App\Models\ResponseCareer;
use App\Models\Career;
use App\Models\Project;
use Illuminate\Http\Request;

class UserCareer extends Controller
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
        return view('createCareer',[
            'careers' => Career::all()
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
            'nama_lengkap' => 'required|max:255',
            'career_id' => 'required',
            'email' => ['required', 'email:dns'],
            'cv' => 'file|max:4098',
            'berkas_lain' => 'file|max:1024',
            'no_hp' => 'required|numeric'
        ]);

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
     * @param  \App\Models\ResponseCareer  $responseCareer
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        return  view('showCareer', [
            'career' => $career,
            'response_careers' => ResponseCareer::Where('career_id', $career->id)->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ResponseCareer  $responseCareer
     * @return \Illuminate\Http\Response
     */
    public function edit(ResponseCareer $responseCareer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ResponseCareer  $responseCareer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResponseCareer $responseCareer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResponseCareer  $responseCareer
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResponseCareer $responseCareer)
    {
        ResponseCareer::destroy($responseCareer->id);

        return  redirect('/dashboard/careers')->with('success', 'Data Response Career has been deleted!');
    }
}
