<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class VisitController extends Controller
{
    public function index()
    {
        $visits = Visit::paginate(5); 

        return Inertia::render('List', [
            'visits' => $visits,
        ]);
    }

    public function create()
    {
        return Inertia::render('New', []);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'latitude' => 'required|string',
            'longitude' => 'required|string',
            'email' => 'required|email|unique:visits,email',
            'password' => 'required|string|min:8',
        ]);

        // Crear la nueva visita
        $visit = Visit::create([
            'name' => $validated['name'],
            'latitude' => $validated['latitude'],
            'longitude' => $validated['longitude'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('visits.index')->with('success', 'Visita creada exitosamente');
    }
}
