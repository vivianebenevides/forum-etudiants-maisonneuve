<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('auth.create', ['villes' => $villes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20',
            'adresse' => 'required|min:6|max:50',
            'phone' => 'required|numeric|integer|min:0',

        ]);

        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        $etudiant = new Etudiant;
        $etudiant->fill($request->all());
        $etudiant->id = $user->id;
        $etudiant->save();

        return redirect(route('login'))->withSuccess('User enregistré');
    }

    public function authentication(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        
        $credentials = $request->only('email', 'password');
        
        if(!Auth::validate($credentials)):
            return redirect('login')
                    ->withErrors(trans('auth.failed'));
        endif;
        
        $user = Auth::getProvider()->retrieveByCredentials($credentials);
           
        Auth::login($user, $request->get('remember'));
           
        return redirect()->intended(route('forum.index'))->withSuccess('Signed in');
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

