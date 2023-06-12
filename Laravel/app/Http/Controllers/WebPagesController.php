<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebPagesController extends Controller{
    
    public function inicio(){
        return view('welcome');
    }

    public function somos(){
        return view ('components/somos');
    }

    public function foro(){
        return view ('components/foro');
    }

    public function ubicacion(){
        return view ('components/ubicacion');
    }

    public function contacto(){
        return view ('components/contacto');
    }
}
