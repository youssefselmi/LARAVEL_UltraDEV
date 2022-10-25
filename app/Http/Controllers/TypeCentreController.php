<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeCentre;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\CentreController;
use Illuminate\Support\Facades\DB;

use App\Events\NoticeEvent;

class TypeCentreController extends Controller
{
    //


    public function index()
    {
        return view('typescentres.typescentre', [ 'typescentres' => \App\Models\TypeCentre::all() ]);
    }




    public function destroy(TypeCentre $typecentre) {
        


       $donnes = DB::table('centres')->get();

       foreach ($donnes as $lestypes) {

        if($lestypes->type_id==$typecentre->id){
            
         //   $lestypes->delete();    
            DB::table('centres')->where('type_id',$typecentre->id)->delete();
        }
    }


    $typecentre->delete();

        return redirect('/typecentre');
        

    } 

    



    public function add(){



        $data = request()->validate([
            'type' =>'required|alpha|min:2",'
        ],
        [
            'type.required' =>'Remplir le type ',
            'type.min' =>'Taille minimale 2 caractere',
            'type.alpha' =>'Type doit contenir seulement des caracteres',

        ]
    
    
    );
        \App\Models\TypeCentre::create([
          
            'type' => $data['type'],
        ]);

        return redirect('/typecentre');

    }


    public function create(){
        return view('typescentres.addtype')->withSuccess(__('Post delete successfully.'));
;
    }


    






    


    public function getUpdate(TypeCentre $typecentre){
        return view('typescentres.modifiertype', compact('typecentre'));
    }



    public function update(TypeCentre $typecentre,Request $request){

        $data = $request->validate([
            'type' =>'required|alpha|min:2",'
        ],
             
        [
            'type.required' =>'Remplir le type ',
            'type.min' =>'Taille minimale 2 caractere',
            'type.alpha' =>'Type doit contenir seulement des caracteres',

        ]  
    );


        $typecentre->update([
            'type' => $data['type'],
        ]);


        return redirect('/typecentre');
    }













}
