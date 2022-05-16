<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Etudiant;
use App\Models\prof;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if($request->type=="AppModelsEtudiant"){
        //    $request->validate([
        //     'name' => ['string', 'max:255'],
        //     'email' => ['string', 'email', 'max:255', 'unique:users'],
        //     'password' => [ 'confirmed', Rules\Password::defaults()],
        //     'telephone'=>['digits:10'],
        //     'niveau'=>['not_in:0']
        // ]);

        $user = Etudiant::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone'=>$request->telephone,
            'niveau'=>$request->niveau,
            'password' => Hash::make($request->password),

        ]);  
        event(new Registered($user));

        Auth::login($user);

        }
       if($request->type=="AppModelsprof"){
        // $request->validate([
        //     'name' => ['string', 'max:255'],
        //     'email' => ['string', 'email', 'max:255', 'unique:users'],
        //     'password' => [ 'confirmed', Rules\Password::defaults()],
        //     'telephone'=>['digits:10'],
        //     'spécialité'=>['string']
        // ]);

        $user = prof::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone'=>$request->telephone,
            'spécialité'=>$request->spécialité,
            'password' => Hash::make($request->password),

        ]);
        event(new Registered($user));

        Auth::login($user);

       }

   

        return redirect(RouteServiceProvider::HOME);
    }
}
