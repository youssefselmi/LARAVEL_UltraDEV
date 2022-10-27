<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeAppointment;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\DB;

use App\Events\NoticeEvent;

class TypeAppointmentController extends Controller
{
    //


    public function index()
    {
        return view('typeappointments.typesappointment', [ 'typeappointments' => \App\Models\TypeAppointment::all() ]);
    }




    public function destroy(TypeAppointment $typeappointment) {
        


       $donnes = DB::table('appointments')->get();

       foreach ($donnes as $lestypes) {

        if($lestypes->type_id==$typeappointment->id){
            
         //   $lestypes->delete();    
            DB::table('appointments')->where('type_id',$typeappointment->id)->delete();
        }
    }


    $typeappointment->delete();

        return redirect('/typeappointment');
        

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
        \App\Models\TypeAppointment::create([
          
            'type' => $data['type'],
        ]);

        return redirect('/typeappointment');

    }


    public function create(){
        return view('typeappointments.addtype')->withSuccess(__('Post delete successfully.'));
;
    }



    public function getUpdate(TypeAppointment $typeappointment){
        return view('typeappointments.modifiertype', compact('typeappointment'));
    }



    public function update(TypeAppointment $typeappointment,Request $request){

        $data = $request->validate([
            'type' =>'required|alpha|min:2",'
        ],
             
        [
            'type.required' =>'Remplir le type ',
            'type.min' =>'Taille minimale 2 caractere',
            'type.alpha' =>'Type doit contenir seulement des caracteres',

        ]  
    );


        $typeappointment->update([
            'type' => $data['type'],
        ]);


        return redirect('/typeappointment');
    }













}