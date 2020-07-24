<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    /**
     * Toto répond à nos question.
     */
    public function toto(Request $request)
    {
        $number = $request->input('nombre');

        Log::warning('Une personne se demande pourquoi '.$number);

        if ($number === "42") {
            return response()->json([
                "value" => 42,
                "name" => "La grande question sur la vie, l'univers et le reste",
                "source" => "Le Guide du voyageur galactique",
                "meaning" => "C'est la réponse ultime à toutes les questions de l'univers."
            ]);
        }

        if ($number === "301") {
            return redirect()->route('toto');
        }
        
        return view('toto', [
            'date' => date("m-d-Y H:i:s"),
            'nombre' => $number,
        ]);
    }
}