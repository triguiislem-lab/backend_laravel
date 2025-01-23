<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $locations=Location::all();
            return response()->json($locations);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des locations");
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $location=new Location([
            'Nom_location'=>$request->input('Nom_location'),
            'description_location'=>$request->input('description_location'),
            'image_location'=>$request->input('image_location'),
            ]);
        
            $location->save();
            
            
            return response()->json($location);
            
            } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        try {
            $location=Location::findOrFail($id);
            return response()->json($location);
            } catch (\Exception $e) {
            return response()->json("location non trouvé");
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $location=Location::findOrFail($id);
            $location->Nom_location=$request->input('Nom_location');
            $location->description_location=$request->input('description_location');
            $location->image_location=$request->input('image_location');
            $location->save();
            return response()->json($location);
            } catch (\Exception $e) {
            return response()->json($e);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $location=Location::findOrFail($id);
            $location->delete();
            return response()->json("location supprimé");
            } catch (\Exception $e) {
            return response()->json("location non trouvé");
            }
    }
}
