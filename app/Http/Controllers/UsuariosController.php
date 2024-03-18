<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use App\Models\Solicitar;
use Illuminate\Support\Facades\Hash;
use Dirape\Token\Token;
use Illuminate\Support\Facades\Session;
// Agregar 
use Auth;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        $_SESSION = array();
        session_write_close();
        setcookie(session_name(), '', 0, '/');

        Auth::logout();
        Session::flush();

        session(['acceso' => false]);
        return redirect('/login');
    }

    public function index(Request $request){
        $solicitar = Solicitar::all();
        return view('panel')->with('data', $solicitar);
    }

    public function usuarios(Request $request)
    {
        //
    }

    public function login(Request $request){
        $response = [ "status" => 0, "msg" => ""];

        $data = json_decode($request->getContent());

        $user = Usuarios::where('usuario', $data->usuario)->first();

        if($user){
            if(Hash::check($data->password, $user->clave)){

                Auth::login($user);

                $token = $user->createToken('example')->plainTextToken;
                
                $response["status"] = 1;
                $response["msg"] = 'El usuario y la contraseña son correctas';
                $response["token"] = $token;

            } else {
                $response["msg"] = "Usuario y contraseña incorrecta";
            }
        } else {
            $response["msg"] = "Usuario no encontrado";
        }

        return response()->json($response);
    }

    public function weblogin(Request $request){

        $response = [ "status" => 0, "msg" => ""];

        $user = Usuarios::where('usuario', trim($request->usuario))->first();

        if($user){
            if(Hash::check($request->password, $user->clave)){
                
                $response["status"] = 1;
                $response["msg"] = 'El usuario y la contraseña son correctas';
                $response["redirect"] = 'panel';

                session_start();
                //session_regenerate_id(true);
                session(['acceso' => true]);
                session(['nombre' => trim($user->nombre)]);
                session(['apellido' => trim($user->apellido)]);
                session(['usuario' => trim($user->usuario)]);
                session(['clave' => trim($request->password)]);
                session(['nombre' => trim($user->nombre)]);

            } else {
                $response["msg"] = "Usuario y contraseña incorrecta";
            }
        } else {
            $response["msg"] = "Usuario no encontrado";
        }

        return response()->json($response);
    }

    public function nuevoUsuario(Request $request){
        //echo Hash::make('admin'); die();
        $response = [ "status" => 0, "msg" => ""];

        $data = json_decode($request->getContent());

        $nombre = $data->nombre;
        $apellido = $data->apellido;
        $usuario = $data->usuario;
        $clave = $data->password;


        $user = Usuarios::where('usuario', "=", $data->usuario)->first();

        if(!$user){
            
            $nuevoUsuario = new Usuarios();
            $nuevoUsuario->nombre = $nombre;
            $nuevoUsuario->apellido = $apellido;
            $nuevoUsuario->usuario = $usuario;
            $nuevoUsuario->clave = Hash::make($clave);
            $nuevoUsuario->fechayhora_creado = date('Y-m-d H:i:s');
            $nuevoUsuario->save();

            $response["status"] = 1;
            $response["msg"] = 'El usuario fue registrado correctamente';
        } else {
            $response["msg"] = "El Usuario ya se encuentra registrada";
        }

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    
}
