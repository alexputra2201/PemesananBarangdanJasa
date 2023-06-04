<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\ResponseCareer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DashboardCareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.careers.index',[
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
        return view('dashboard.careers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'posisi_career' => 'required|max:255',
            'work_type' => 'required',
            'description_career' => 'required',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->description_career), 400, '...');

        Career::create($validatedData);

        return redirect('/dashboard/careers')->with('success', 'New career has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        return  view('dashboard.careers.show', [
            'career' => $career,
            'response_careers' => ResponseCareer::Where('career_id', $career->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(Career $career)
    {
        return view('dashboard.careers.edit', [
            'career' => $career
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        $validatedData = $request->validate([
            'posisi_career' => 'required|max:255',
            'work_type' => 'required',  
            'description_career' => 'required',
        ]);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->description_career), 400, '...');

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200, '...');

        Career::where('id', $career->id)
            ->update($validatedData);

        return redirect('/dashboard/careers')->with('success', 'Career has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(Career $career)
    {
        Career::destroy($career->id);

        return  redirect('/dashboard/careers')->with('success', 'Career has been deleted!');
    }
}
