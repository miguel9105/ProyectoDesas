<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function enviar(){
        return view('frm_usuario');
    }
    public function enviarUsuario(Request $request){
        $usur = new User();
        $usur->name=$request->name;
        $usur->email=$request->email;
        $usur->password=$request->password;
        $usur->save();
        return $usur;
    }
}
