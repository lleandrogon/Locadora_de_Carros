<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        
        $credenciais = $request->all(['email', 'password']);

        //autenticação (email e senha)
        $token = Auth::attempt($credenciais);
        
        if ($token) { //usuário autenticado com sucesso
            return response()->json(['token' => $token]);
        } else { //erro de usuário ou senha
            return response()->json(['erro' => 'Usuário ou senha inválido!'], 403);

            //401 = Unauthorized -> não autorizado
            //403 = forbidden -> proibido (login inválido)
        }
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'O logout foi realizado com sucesso!']);
    }

    public function refresh() {
        $token = auth('api')->refresh(); //Cliente encaminhe um jwt válido
        return response()->json(['token' => $token]);
    }

    public function me() {
        return response()->json(Auth::user());
    }
}
