<?php

namespace App\Http\Controllers;

use App\Models\Om;
use Auth;

class OmController extends Controller
{
    public function index()
    {

        return view('insideApp.ommanager.index');
    }

    // lista as om para montar options em selects
    public function listaSimples()
    {
        return Om::select('id','sigla')->get();

    }

    // lista as om para montar o orgchart
    public function listaOms()
    {
        return Om::all();
    }

}
