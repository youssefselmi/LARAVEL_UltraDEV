<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCentre;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CentreController;
use Illuminate\Support\Facades\DB;

class TypeCentreController extends Controller
{
    //


    public function index()
    {
        return view('typescentres.typescentre', [ 'typescentres' => \App\Models\TypeCentre::all() ]);
    }



    public function destroy(TypeCentre $typecentre) {
        

       $typecentre->delete();

       $donnes = DB::table('centres')->get();

       foreach ($donnes as $lestypes) {

        if($lestypes->type==$typecentre->type){
            
         //   $lestypes->delete();    
            DB::table('centres')->where('type',$typecentre->type)->delete();
        }
    }



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


    






    


    public function getUpdate(TypeCentre $typecentre){
        return view('typescentres.modifiertype', compact('typecentre'));
    }



    public function update(TypeCentre $typecentre,Request $request){

        $data = $request->validate([
            'type' =>'required',
        ],
        
        [
            'type.required' =>'Remplir le type ',      
        ]  
    );


        $typecentre->update([
            'type' => $data['type'],
        ]);

        return redirect('/typecentre');
    }













}
