<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $payments = Payment::all();
            return response()->json($payments);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des paiements");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $payment = new Payment([
                'id_cart' => $request->input('id_cart'),
                
            ]);

            $payment->save();

            return response()->json($payment);
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
            $payment = Payment::findOrFail($id);
            return response()->json($payment);
        } catch (\Exception $e) {
            return response()->json("paiement non trouvé");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->update($request->all());
            return response()->json($payment);
        } catch (\Exception $e) {
            return response()->json("paiement non trouvé");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $payment = Payment::findOrFail($id);
            $payment->delete();
            return response()->json("paiement supprimé");
        } catch (\Exception $e) {
            return response()->json("paiement non trouvé");
        }
    }
}
