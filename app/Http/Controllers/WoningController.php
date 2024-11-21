<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Woning;
class WoningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $woning = Woning::all();
     
        return view('woning.index', compact('woning')); // -> resources/views/woning/index.blade.php 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('woning.create'); // -> resources/views/woning/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'Titel' => 'required',
            'Omschrijving' => 'required',
            'Oppervlakte' => 'required',
            'PrijsPerWeek' => 'required',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',  
        ]);


        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('images', 'public'); 
            }
        }


        $woning = new Woning([
            'Titel' => $request->get('Titel'),
            'Omschrijving' => $request->get('Omschrijving'),
            'Oppervlakte' => $request->get('Oppervlakte'),
            'PrijsPerWeek' => $request->get('PrijsPerWeek'),
            'image' => json_encode($imagePaths),  
        ]);

        $woning->save();  


        return redirect('/woning')->with('success', 'Woning opgeslagen.');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $woning = Woning::find($id);
        return view('woning.show', compact('woning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $woning = Woning::find($id);
        return view('woning.edit',['woning'=>$woning]);  // -> resources/views/woning/edit.blade.php
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $woning = Woning::find($id);

    $request->validate([
        'Titel' => 'required',
        'Omschrijving' => 'required',
        'Oppervlakte' => 'required',
        'PrijsPerWeek' => 'required',
        'images' => 'nullable|array',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $woning->update([
        'Titel' => $request->get('Titel'),
        'Omschrijving' => $request->get('Omschrijving'),
        'Oppervlakte' => $request->get('Oppervlakte'),
        'PrijsPerWeek' => $request->get('PrijsPerWeek'),
    ]);


    if ($request->hasFile('images')) {
        $imagePaths = [];

        foreach ($request->file('images') as $image) {
            $imagePaths[] = $image->store('images', 'public');  
        }

        $woning->image = json_encode($imagePaths);
        $woning->save();  
    }

    return redirect('/woning')->with('success', 'Woning bijgewerkt.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $woning = Woning::find($id);
        $woning->delete(); // Easy right?
    
        return redirect('/woning');  // -> resources/views/woning/index.blade.php
    } 
}
