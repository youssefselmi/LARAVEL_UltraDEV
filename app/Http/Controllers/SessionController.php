<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    
    public function index()
    {
        $lesss = DB::table('type_centres')->get();

        return view('sessions.session', [ 'sessions' => \App\Models\Session::all() ], compact('lesss'));
    }
    public function destroy(Session $session) {
        


    /*    $donnes = DB::table('formations')->get();
    
        foreach ($donnes as $lestypes) {
    
         if($lestypes->type_id==$sessions->id){
             
          //   $lestypes->delete();    
             DB::table('formations')->where('type_id',$sessions->id)->delete();
         }
     }*/
     $session->delete();

     return redirect('/session');
     

 } 

 public function add(){



    $data = request()->validate([
        'nom_session' =>'required',
        'date_session' =>'required',
        'capacite' =>'required',
        'formation_id' =>'',

        
    ],
    [
        'nom_session.required' =>'Remplir le nom du session ',
        'date_session.required' =>'Remplir la date du session ',
        'capacite.required' =>'Remplir l capacite ',
    ]


);
    \App\Models\Session::create([
      
        'nom_session' => $data['nom_session'],
        'date_session' => $data['date_session'],
        'capacite' => $data['capacite'],
        'formation_id' => $data['formation_id'],

    ]);

    return redirect('/session');

}


public function create(){

    $donnes = DB::table('type_centres')->get();
    return view('sessions.addsession')->withSuccess(__('session created successfully.'));
;
}









public function getUpdate(Session $session){

    $les = DB::table('formations')->get();
    return view('sessions.modifiersession', compact('session'), compact('les'));
}


public function update(Session $session,Request $request){

    $data = request()->validate([
        'nom_session' =>'required',
        'date_session' =>'required',
        'capacite' =>'required',
        'formation_id' =>'',

        
    ],
    [
        'nom_session.required' =>'Remplir le nom du session ',
        'date_session.required' =>'Remplir la date du session ',
        'capacite.required' =>'Remplir l capacite ',
    ]


);

    $session->update([
        'nom_session' => $data['nom_session'],
        'date_session' => $data['date_session'],
        'capacite' => $data['capacite'],
        'formation_id' => $data['formation_id'],

    ]);


    return redirect('/session');
}


    
}

