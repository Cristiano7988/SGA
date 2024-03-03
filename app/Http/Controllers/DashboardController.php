<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use \App\Models\{ Evento };

class DashboardController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $eventos = Evento::whereIn('id', $usuario->pontos->pluck("evento_id"))->get();
    
        return Inertia::render('Dashboard', [
            'eventos' => $usuario->eventos->count(),
            'comparecidos' => $eventos->count(),
        ]);
    }
}
