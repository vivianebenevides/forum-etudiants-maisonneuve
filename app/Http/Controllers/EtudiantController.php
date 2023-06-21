<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;
use Carbon\Carbon;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all(); //select * from etudiant
        return view('etudiants.index', ['etudiants' => $etudiants]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ville = Ville::selectVille();
        $villes = Ville::all();

        return view('etudiants.create', ['ville' => $ville, 'villes' => $villes]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dateDeNaissance = date('Y-m-d', strtotime(str_replace('/', '-', $request->date_de_naissance)));


        $newEtudiant = Etudiant::create([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $dateDeNaissance,
        ]);

        //return redirect(route('etudiants.show', $newEtudiant->id));
        return view('etudiants.show', ['etudiants' => $newEtudiant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        return view ('etudiants.show', ['etudiants' => $etudiant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        $villes = Ville::all();
        
        return view('etudiants.edit', ['etudiant' => $etudiant, 'villes' => $villes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        $dateDeNaissance = date('Y-m-d', strtotime(str_replace('/', '-', $request->date_de_naissance)));

        $etudiant->update([
            'name' => $request->name,
            'adresse' => $request->adresse,
            'ville_id' => $request->ville_id,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $dateDeNaissance,
        ]);

        return redirect(route('etudiants.show', $etudiant));
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        
        return redirect(route('etudiants.index'));
    }
}
