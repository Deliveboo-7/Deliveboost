<?php

namespace App\Http\Controllers;

use App\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getTypologies() {
        $typologies = DB::table('typologies') -> select('id', 'name') -> get();
        return response() -> json($typologies);
    }
}
