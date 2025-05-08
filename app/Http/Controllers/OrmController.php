<?php

namespace App\Http\Controllers;


use App\Models\Publication;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Role;

class OrmController extends Controller
{
  
      
    
    //consultas usuario
    public function consultas(){
        //ADRIANA
        // $user =User::find(1);
        // return $user;

        //DAVID
        //$roles = Role::all(); // Esto trae todos los registros de la tabla roles
        //return $roles;

        // //MICHELLE
        // $message =Message::find(1);
        // return $message;

        //Kev
        // $notificaciones = Notification::all();
        // return $notificaciones;

        //MIGUEL
        $publication=Publication::find(1);
        return $publication;
    }



}






