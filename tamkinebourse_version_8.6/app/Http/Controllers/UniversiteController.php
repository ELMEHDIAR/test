<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Universite;
use App\Domaine;

class UniversiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('universites.index')->with('universites', Universite::all())->with('domaines', Domaine::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('universites.create')->with('universites', Universite::all())->with('domaines', Domaine::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom_universite'=>'required',
            'domaines'=>'required'
        ]);

        $universite = Universite::create([
            'nom_universite' => $request->nom_universite
        ]);

        $universite->domaines()->attach($request->domaines);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $universite = Universite::find($id);
        return view('universites.edit')->with('universites', $universite);
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
        $universite = Universite::find($id);
        $universite->nom_universite = $request->nom_universite;
        $universite->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $universite = Universite::find($id);
        $universite->destroy($id);
        return redirect()->back();
    }
}
