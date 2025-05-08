<?php

namespace App\Http\Controllers;

use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{


    //

    public function vista_publi(){
        return view('frm_pulication');
    }

    public function respuesta_publi(Request $request)  {
        $res = new Publication();
        $res->title=$request->title;
        $res->description=$request->description;
        $res->url_img=$request->url_img;
        $res->date_publication=$request->date_publication;
        $res->ubication=$request->ubication;
        $res->save();
        return $res;
    }


}
