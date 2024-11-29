<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar las credenciales proporcionadas
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Buscar el usuario por documento
        $user = User::where('email', $email)->first();

        // Si no se encuentra el usuario
        if (!$user) {
            return response()->json([
                'message' => 'El documento proporcionado no coincide con ningún usuario registrado.',
            ], 404);
        }

        // Verificar si la contraseña es incorrecta
        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'message' => 'La contraseña es incorrecta.',
            ], 401);
        }


        // Si todas las validaciones pasan, generar el token de acceso
        try {
            $tokenResult = $user->createToken('Personal Access Token');
            $token = $tokenResult->accessToken;

            return response()->json([
                'user' => $user,
                'role' => $user->role->name,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
                'message' => 'Ingreso exitoso'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error al generar el token de acceso. Intente nuevamente más tarde.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function register(Request $request)
    {
        // Validar los datos del registro
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:100',
            'document' => 'required|string|max:50',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
        ]);
        
        Log::info('Datos recibidos para registro:', $request->all());

        
        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'document' => $request->document,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'id_role' => 2, 
        ]);

        return response()->json([
            'message' => 'Registro exitoso',
            'user' => $user,
        ], 201);
    }
}
