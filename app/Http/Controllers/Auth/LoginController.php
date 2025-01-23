<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            // Valider et authentifier l'utilisateur
            $request->authenticate();

            // Regénérer la session pour des raisons de sécurité
            $request->session()->regenerate();

            // Retourner une réponse de succès
            return response()->json([
                'message' => 'Connexion réussie',
                'user' => Auth::user(),
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Retourner une réponse avec un message d'erreur
            return response()->json([
                'message' => 'Échec de la connexion',
                'errors' => $e->errors(),
            ], 422); // 422 : Unprocessable Entity
        } catch (\Exception $e) {
            // Gestion des autres erreurs
            return response()->json([
                'message' => 'Une erreur inattendue s\'est produite',
                'error' => $e->getMessage(),
            ], 500); // 500 : Internal Server Error
        }
    }

    /**
     * Handle logout request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        try {
            Auth::logout();

            // Invalider la session actuelle
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Retourner une réponse de succès
            return response()->json([
                'message' => 'Déconnexion réussie',
            ], 200);
        } catch (\Exception $e) {
            // Gestion des erreurs lors de la déconnexion
            return response()->json([
                'message' => 'Une erreur s\'est produite lors de la déconnexion',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
