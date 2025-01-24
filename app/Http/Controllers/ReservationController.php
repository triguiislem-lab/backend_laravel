<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $reservations = Reservation::with(['user', 'vol'])->get(); // Charger les relations avec user et vol
            return response()->json($reservations, 200);
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Créer une nouvelle réservation
            $reservation = new Reservation([
                'nombre_place_reservé' => $request->input('nombre_place_reservé'),
                'user_id' => $request->input('user_id'),
                'vol_id' => $request->input('vol_id'),
            ]);

            // Sauvegarder la réservation
            $reservation->save();

            // Retourner la réservation nouvellement créée
            return response()->json([
                'message' => 'Réservation créée avec succès',
                'reservation' => $reservation,
            ], 201);
        } catch (\Exception $e) {
            // En cas d'erreur, retourner une réponse JSON avec l'erreur
            return response()->json([
                'error' => 'Problème lors de la création de la réservation',
                'details' => $e->getMessage(),
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        try {
            $reservation->load(['user', 'vol']); // Charger les relations avec user et vol
            return response()->json($reservation, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Problème de récupération de la réservation'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            // Récupérer la réservation avec l'ID passé dans la requête
            $reservation = Reservation::findOrFail($id);

            // Mettre à jour la réservation avec toutes les données de la requête
            $reservation->update($request->all());

            // Retourner la réponse avec la réservation mise à jour
            return response()->json($reservation);
        } catch (\Exception $e) {
            // En cas d'erreur, retourner un message d'erreur
            return response()->json($e);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Récupérer la réservation avec l'ID passé dans la requête
            $reservation = Reservation::findOrFail($id);

            // Supprimer la réservation
            $reservation->delete();

            // Retourner une réponse indiquant que la suppression a été réussie
            return response()->json("Réservation supprimée avec succès");
        } catch (\Exception $e) {
            // En cas d'erreur, retourner un message d'erreur avec l'exception
            return response()->json("Suppression impossible: {$e->getMessage()}", 500);
        }
    }

}
