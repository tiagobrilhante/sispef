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
        return Om::select('id', 'sigla')->get();

    }

    // lista as om para montar o orgchart
    public function listaOms()
    {
        return Om::all();
    }

    // exclui uma om
    public function destroy($om)
    {

        $om = Om::find($om);

        if ($om->parent == 0) {
            return 'erro_Não é permitido deletar a Om primária!';
        } else {
            $om->delete();
            return 'sucesso';
        }

    }

    // update uma Om
    public function update(UpdateOmRequest $request, $om)
    {

        // aqui eu tento encontrar a OM a se atualizada
        //se ela não existe ainda, tenho que criar
        //  se ela existe devo atualizar...

        if (Om::find($om) == '') {

            // crio uma nova

            $name = $request['name'];
            $sigla = $request['sigla'];
            $cor = $request['cor'];
            $podeVerTudo = $request['podeVerTudo'];
            $ePef = $request['ePef'];
            $novoNo = false;
            $parent = $request['parent'];
            $eixo_x = $request['eixo_x'];
            $eixo_y = $request['eixo_y'];
            $om_id = $request['om_id'];

            $om = Om::create([
                'name' => $name,
                'sigla' => $sigla,
                'cor' => $cor,
                'podeVerTudo' => $podeVerTudo,
                'ePef' => $ePef,
                'novoNo' => $novoNo,
                'parent' => $parent,
                'eixo_x' => $eixo_x,
                'eixo_y' => $eixo_y,
                'om_id' => $om_id,
            ]);

        } else {

            // atualizo
            $om = Om::find($om);


            $name = $request['name'];
            $sigla = $request['sigla'];
            $cor = $request['cor'];
            $podeVerTudo = $request['podeVerTudo'];
            $ePef = $request['ePef'];
            $novoNo = false;
            $parent = $request['parent'];
            $eixo_x = $request['eixo_x'];
            $eixo_y = $request['eixo_y'];
            $om_id = $request['om_id'];

            $om->name = $name;
            $om->sigla = $sigla;
            $om->cor = $cor;
            $om->podeVerTudo = $podeVerTudo;
            $om->ePef = $ePef;
            $om->eixo_x = $eixo_x;
            $om->eixo_y = $eixo_y;
            $om->save();

        }

        return $om;
    }

}
