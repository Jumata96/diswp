<?php

namespace InnovaTec\Http\Controllers\Auth;

use InnovaTec\User;
use InnovaTec\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use InnovaTec\Mail\WelcomeUser;
use InnovaTec\Mail\WelcomeUserToAdmin;
use Illuminate\Support\Facades\Mail;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \InnovaTec\User
     */
    protected function create(array $data)
    {
        $id = count(DB::table('users')->get()) + 1;
        $usu = null;

        $usu = $data['usu'];

       
        if ($usu == 'ADMIN') {
            $usuarioAdm =  User::create([
                'id'        => $id,
                'estado'    => 1,
                'nombre'    => $data['nombre'],
                'email'     => $data['email'],
                'usuario'   => $data['usuario'],
                'password'  => Hash::make($data['password']),
                'idtipo'    => 'ADM'
            ]);
/*******CREAMOS UN USUARIO EN MSJ_COMPRA PARA ENVIARLE UN MSJ***************/
            DB::table('msj_compra')
                    ->insert([
                        'user_email' => $data['email'],
                        'fecha'     => date('Y-m-d H:m:s'),
                        'asunto'    => 'NVOCLE',
                        'visto'     => '0'
                    ]);

            $emails_admins = DB::table('users')
                        ->select('email')
                        ->where('idtipo','ADM')
                        ->get();

            $newUser = DB::table('users')
                        ->select('id','nombre','apellidos','email', 'usuario')
                        ->where('id','=',$id)
                        ->get()
                        ->first();                  
            Mail::to($emails_admins)->send(new WelcomeUserToAdmin($newUser));           
            Mail::to($newUser->email)->send(new WelcomeUser($newUser));
            return $usuarioAdm;

        }else if ($usu == 'CLE'){
            $usuarioCle = User::create([
                'id'        => $id,
                'estado'    => 1,
                'nombre'    => $data['nombre'],
                'apellidos' => $data['apellidos'],
                'email'     => $data['email'],
                'usuario'   => $data['usuario'],
                'password'  => Hash::make($data['password']),
                'ruc'       => $data['ruc'],
                'razon_social' => $data['razon_social'],
                'telefono'  => $data['telefono'],
                'direccion' => $data['direccion'],
                'registro'  => 'MANUAL',
                'idtipo'    => 'CLE'
            ]);

/*******CREAMOS UN USUARIO EN MSJ_COMPRA PARA ENVIARLE UN MSJ***************/
            DB::table('msj_compra')
                    ->insert([
                        'user_email' => $data['email'],
                        'fecha'     => date('Y-m-d H:m:s'),
                        'asunto'    => 'NVOCLE',
                        'visto'     => '0'
                    ]);

           $emails_admins = DB::table('users')
                        ->select('email')
                        ->where('idtipo','ADM')
                        ->get();

            $newUser = DB::table('users')
                        ->select('id','nombre','apellidos','email', 'usuario')
                        ->where('id','=',$id)
                        ->get()
                        ->first();                  
            Mail::to($emails_admins)->send(new WelcomeUserToAdmin($newUser));           
            Mail::to($newUser->email)->send(new WelcomeUser($newUser));
            return $usuarioCle;
        }        
    }
}
