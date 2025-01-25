<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $services=Service::all();
            return response()->json($services);
            } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des services");
            }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $service=new Service([
            'Nom_service'=>$request->input('Nom_service'),
            'description_service'=>$request->input('description_service'),
            ]);
        
            $service->save();
            
            
            return response()->json($service);
            
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
            $service=Service::findOrFail($id);
            return response()->json($service);
            } catch (\Exception $e) {
            return response()->json("service non trouvé");
            }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $service=Service::findOrFail($id);
            $service->Nom_service=$request->input('Nom_service');
            $service->description_service=$request->input('description_service');
            $service->save();
            return response()->json($service);
            } catch (\Exception $e) {
            return response()->json("service non trouvé");
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $service=Service::findOrFail($id);
            $service->delete();
            return response()->json("service supprimé");
            } catch (\Exception $e) {
            return response()->json("service non trouvé");
            }
    }
}
