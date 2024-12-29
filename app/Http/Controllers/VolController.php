<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use Illuminate\Http\Request;

class VolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $vols=vol::all();
            return response()->json($vols);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des vols");
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        try {
            $vol=new vol([
            'numero_vol'=>$request->input('numero_vol'),
            'ville_depart'=>$request->input('ville_depart'),
            'ville_arrivee'=>$request->input('ville_arrivee'),
            'date_depart'=>$request->input('date_depart'),
            'date_arrivee'=>$request->input('date_arrivee'),
            'nombre_place'=>$request->input('nombre_place'),
            'type_vol'=>$request->input('type_vol'),
            'statut'=>$request->input('statut'),
            'prix'=>$request->input('prix'),
            ]);
        
            $vol->save();
            
            
            return response()->json($vol);
            
            } catch (\Exception $e) {
            return response()->json($e);
            }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $vol=Vol::findOrFail($id);
            return response()->json($vol);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération des données");
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $vol=Vol::findorFail($id);
            $vol->update($request->all());
            return response()->json($vol);
            } catch (\Exception $e) {
            return response()->json("probleme de modification");
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $vol=Vol::findOrFail($id);
            $vol->delete();
            return response()->json("vol supprimée avec succes");
            } catch (\Exception $e) {
            return response()->json("probleme de suppression de vol");
            }
    }
}
