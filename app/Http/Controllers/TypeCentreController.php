<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCentre;

class TypeCentreController extends Controller
{
    //


    public function index()
    {
        return view('typescentres.typescentre', [ 'typescentres' => \App\Models\TypeCentre::all() ]);
    }



    public function destroy(TypeCentre $typecentre) {
        
        $typecentre->delete();
        return redirect('/typecentre');

    }





    public function add(){
        $data = request()->validate([
            'type' =>'required'
        ],
        [
            'type.required' =>'Remplir le type ',
        ]
    
    
    );
        \App\Models\TypeCentre::create([
          
            'type' => $data['type'],
        ]);

        return redirect('/typecentre');

    }


    public function create(){
        return view('typescentres.addtype');
    }















}
