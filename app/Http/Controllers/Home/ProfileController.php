<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\{UserStoreRequest, UserUpdateRequest};
use Illuminate\Http\Request;
use App\Models\{Role, User};
use App\Services\UserService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
use Exception;
use Illuminate\Database\Eloquent\Model;

class ProfileController extends Controller
{
    private $userService;

    public function __construct(UserService $service)
    {
        $this->userService = $service;
    }

    public function index(Request $user)
    {
        if($user->ajax()){   
            $user = Auth::user();
        }else{
            $roles = Role::get(['id', 'name']);
            $genders = config('parameters.genders');
            $document_types = config('parameters.document_types');

            return view('home.profile.index', compact(
                'user',
                'roles',
                'genders',
                'document_types'
            ));
        }
    }

    public function editValidate(Request $request, string $column)
    {
        $id = $request['id'];
        $user = User::where($column, $request[$column])->first();

        return $user == null || $user->id == $id ? 'true' : 'false';
    }

    

    public function order(Request $user)
    {
        return view('home.profile.order');
    }
    
    public function password(Request $user)
    {
        return view('home.profile.password');
    }

    public function verificarContrasena(Request $request)
    {
        $request->validate([
            'contrasena_actual' => 'required',
        ]);

        $usuario = auth()->user();

        // Verificar si la contraseña actual es correcta
        $valid = Hash::check($request->contrasena_actual, $usuario->password); // Asegúrate de usar 'password' en lugar de 'contrasena'

        if ($valid) {
            return response()->json(['mensaje' => 'Contraseña correcta', 'valid' => true]);
        } else {
            return response()->json(['mensaje' => 'Contraseña incorrecta', 'valid' => false]);
        }
    }

    public function editarContrasena(Request $request)
    {
        $request->validate([
            'contrasena_actual' => 'required',
            'nueva_contrasena' => 'required|min:8',
        ]);

        $usuario = auth()->user();

       
        if ($this->userService->actualizarContrasena($usuario, $request->contrasena_actual, $request->nueva_contrasena)) {
            return redirect()->route('home.profile.password')->with('mensaje', 'Contraseña actualizada correctamente');
        } else {
            return redirect()->route('home.profile.password')->withErrors(['contrasena_actual' => 'La contraseña actual no es correcta']);
        }
    }
}