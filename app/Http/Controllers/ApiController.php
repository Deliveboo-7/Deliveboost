<?php

namespace App\Http\Controllers;

use App\Typology;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function restaurantsByTypology($id) {
//        dd($typeName);
//        Find typology clicked by user
        $typology = Typology::findOrFail($id);

//        Get all restaurants VERSION 1
        $restaurants = $typology -> users() -> get();
//        $typology = $restaurants -> typologies() -> get();

//        Get all restaurants VERSION 2
//        $restaurants = DB::table('typology_user') -> where('typology_id', $typology -> id) -> get();
        return response() -> json($restaurants);
    }
}
