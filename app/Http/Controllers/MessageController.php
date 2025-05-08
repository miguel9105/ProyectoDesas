<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Mostrar el formulario para enviar un mensaje
    public function enviar()
    {
        return view('createMessage');
    }

    public function store(Request $request){
        $respu= new Message();
        $respu->content=$request->content;
        $respu->is_admin_message=$request->is_admin_message;
        $respu->is_read=$request->is_read;
        $respu->save();
        return $respu;
    }
}
