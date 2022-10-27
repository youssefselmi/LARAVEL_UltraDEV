<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Centre;

class Frontofficecontroller extends Controller
{
    //
    
    public function indexfront()
    {
        $less = DB::table('type_centres')->get();

        return view('frontoffice.indexfront', [ 'centres' => \App\Models\Centre::all() ], compact('less'));
    }





    public function showfront($id){
        $centres=Centre::find($id);
        return view('frontoffice.show')->with('centres', $centres);
}

    



}
