<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function restaurantsByTypology(Request $request) {

//        Array con i parametri (id tipologie)
//        dati che arrivano dal frontend tipologie cliccate
        $typologiesIds = $request -> all();

//        Array che conterrà solo i ristoranti
//        appartenenti ad entrambe le tipologie
        $match = [];

//        Array che conterrà solo gli id degli utenti
//        appartenenti ad entrambe le tipologie
        $usersIds = [];

//        Ciclo l'array con gli id di tutte le tipologie
//        Trovo quella corrispondente
//        E prendo tutti gli utenti collegati quella tipologia
        for ($i = 0; $i < count($typologiesIds); $i++) {
            $typology = Typology::find($typologiesIds[$i]);
            $users = $typology -> users() -> get();

//            Ciclo l'array di utenti
//            Pusho l'id del singolo utente in $userIds
            foreach ($users as $user) {
                $usersIds[] = $user -> id;
            }
        }

//        Array con chiave => valore
//        come chiave l'id e come valore il numero di volte che l'id si ripete
        $userIdsCount = array_count_values($usersIds);

//        Ciclo sull'array creato controllando se:
//        il numero di volte che appare l'id è uguale
//        al numero delle tipologie selezionate da frontend
//        Pusho quell'id nell'array match
        foreach ($userIdsCount as $id => $count) {

            if ($count == count($typologiesIds)) {
                $match[] = $id;
            }
        }

//        Ritorno un json con gli utenti presi tramite gli id nell'array match
        return response() -> json(User::findOrFail($match));

    }
}
