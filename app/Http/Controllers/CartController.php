<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $carts = Cart::all();
            return response()->json($carts);
        } catch (\Exception $e) {
            return response()->json("probleme de récupération de la liste des paniers");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $cart = new Cart([
                'reservation_id' => $request->input('reservation_id'),
             
            ]);

            $cart->save();

            return response()->json($cart);
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
            $cart = Cart::findOrFail($id);
            return response()->json($cart);
        } catch (\Exception $e) {
            return response()->json("panier non trouvé");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $cart = Cart::findOrFail($id);
            $cart->update($request->all());
            return response()->json($cart);
        } catch (\Exception $e) {
            return response()->json("probleme de mise à jour du panier");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        try {
            $cart = Cart::findOrFail($id);
            $cart->delete();
            return response()->json("panier supprimé");
        } catch (\Exception $e) {
            return response()->json("probleme de suppression du panier");
        }
    }
}
