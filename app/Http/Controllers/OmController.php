<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOmRequest;
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


    // exclui uma seção
    public function destroy($om)
    {

        $om = Om::find($om);

        if ($om->parent == 0){
            return 'erro_Não é permitido deletar a Om primária!';
        } else {
            $om->delete();
            return 'sucesso';
        }

    }

    // update uma Om
    public function update(UpdateOmRequest $request, Om $om)
    {


        //$om->update($request->all());

        return $request->all();
    }

}
