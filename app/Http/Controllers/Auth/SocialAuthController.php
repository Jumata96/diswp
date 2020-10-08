<?php

namespace InnovaTec\Http\Controllers\Auth;

use Illuminate\Http\Request;
use InnovaTec\Http\Controllers\Controller;
use Illuminate\Support\Collection as Collection;
use Carbon\Carbon;
use Auth;
use DB;
use App\User;
use Socialite;

class SocialAuthController extends Controller
{
    // Metodo encargado de la redireccion a Facebook
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // Metodo encargado de obtener la información del usuario
    public function handleProviderCallback($provider)
    {
    	$id = count(DB::table('users')->get()) + 1;
        // Obtenemos los datos del usuario
        $social_user = Socialite::driver($provider)->user(); 
        dd($social_user);
        // Comprobamos si el usuario ya existe
        if ($user = User::where('email', $social_user->email)->first()) { 
            return $this->authAndRedirect($user); // Login y redirección
        } else {  
            // En caso de que no exista creamos un nuevo usuario con sus datos.
            $user = User::create([
                'id'        => $id,
                'estado'    => 1,
                'nombre'    => $social_user->name,
                'email'     => $social_user->email,
                'usuario'   => $social_user->id,
                'avatar' 	=> $social_user->avatar,
                'password'  => Hash::make($social_user->id),
            ]);

            return $this->authAndRedirect($user); // Login y redirección
        }
    }

    // Login y redirección
    public function authAndRedirect($user)
    {
        Auth::login($user);

        return redirect()->to('/home');
    }
}
