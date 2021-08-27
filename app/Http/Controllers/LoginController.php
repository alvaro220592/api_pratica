<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        
        // validação da entrada de dados:
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        // checando se o usuário existe no sistema:
        $user = User::where('email', $request->email)->first();

        // se não existir:
        if(! $user){
            return response()->json(['Mensagem' => 'Usuário inexistente']);
        }

        if(! Hash::check($request->password, $user->password)){
            return response()->json(['Mensagem' => 'Senha incorreta']);
        }

        // Se estiver tudo ok, será criado o token:
        $token = $user->createToken($request->email.strtotime('now'))->plainTextToken;

        // Retorno final:
        return [
            'access_token' => $token,
            'token_type' => 'bearer'
        ];

    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();

        return response()->json(['Mensagem' => 'Logout'], 201);
    }
}
