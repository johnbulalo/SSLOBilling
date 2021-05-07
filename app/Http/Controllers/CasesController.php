<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cases;

class CasesController extends Controller
{
    //

    public function index(){

        $cases = Cases::all();

        return view ('cases',[
            'cases'=> $cases,
            ]);
    }
}
