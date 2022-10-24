<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Session;
use Illuminate\Support\Facades\DB;

class FormationController extends Controller
{
    public function index()
    {
          $less = DB::table('sessions')->get();
     
        return view('formations.formation', [ 'formations' => \App\Models\Formation::all() ], compact('less'));
    }
    public function index2()
    {
        return view('formations.gridformation', [ 'formations' => \App\Models\Formation::all() ]);
    }
    public function getsessions()
    {
        return view('sessions.addsession', [ 'po' => \App\Models\Session::all() ]);
    }
    public function add(){


        $data = request()->validate([
            'nom' =>'required',
            'image' => ['required', 'image'],
            'description' =>'required',
            'mail_formateur' =>'required',
            'nom_formateur' =>'required',
            'formateur_profession' =>'required',
            'location_formation' =>'required',
            'prix_formation' =>'required',
            'duree_formation' =>'required',
            'session_id' =>'',
         
        ],
        
        [
            'nom.required' =>'Remplir le nom ',
            'description.required' =>'Remplir la description ',
            'image.required' =>'Remplir image ',
           'session_id.required' =>'Remplir id formassions ',  
            'mail_formateur.required' =>'Remplir le mail du formateur ',
            'nom_formateur.required' =>'Remplir le nom du formateur ',
            'prix_formation.required' =>'Remplir le prix du formation ',
            'duree_formation.required' =>'Remplir la durée du formation ',
            'formateur_profession.required' =>'Remplir la formation du formateur ',
            'location_formation.required' =>'Remplir la location du formation ',    
        ]  
    );
        request()->file('image')->move(
            public_path('storage/imgs'),
            request()->file('image')->getClientOriginalName()
        );

        \App\Models\Formation::create([
          

            'nom' =>$data['nom'],
            'image' => $data['image']->getClientOriginalName(),
            'description' => $data['description'],
            'mail_formateur' => $data['mail_formateur'],
            'nom_formateur' => $data['nom_formateur'],
            'formateur_profession' => $data['formateur_profession'],
            'location_formation' => $data['location_formation'],
            'prix_formation' => $data['prix_formation'],
            'duree_formation' => $data['duree_formation'],
            'session_id' => $data['session_id'],
        ]);


        
        return redirect('/formation');

    }
    public function create(){

        $donnes = DB::table('sessions')->get();
        return view('formations.addformations');
    }
    public function destroy(Formation $formation) {

        $formation->delete();
        return redirect('/formation');

    }
    public function getUpdate(Formation $formation){
        $les = DB::table('sessions')->get();
       //return dd($les);
       return view('formations.modifierformation', compact('formation'), compact('les'));
   }
   
   public function update(Formation $formation,Request $request){

    $data = request()->validate([
        'nom' =>'required',
        'image' => ['required', 'image'],
        'description' =>'required',
        'mail_formateur' =>'required',
        'nom_formateur' =>'required',
        'formateur_profession' =>'required',
        'location_formation' =>'required',
        'prix_formation' =>'required',
        'duree_formation' =>'required',
        'session_id' =>'required',
     
    ],
    
    [
        'nom.required' =>'Remplir le nom ',
        'description.required' =>'Remplir la description ',
        'image.required' =>'Remplir image ',
        'session_id.required' =>'Remplir id formassions ',  
        'mail_formateur.required' =>'Remplir le mail du formateur ',
        'nom_formateur.required' =>'Remplir le nom du formateur ',
        'prix_formation.required' =>'Remplir le prix du formation ',
        'duree_formation.required' =>'Remplir la durée du formation ',
        'formateur_profession.required' =>'Remplir la formation du formateur ',
        'location_formation.required' =>'Remplir la location du formation ',    
    ]  
);

    $path = '';
    if (request()->hasFile('image')){
        request()->file('image')->move(
            public_path('storage/imgs'),
            request()->file('image')->getClientOriginalName()
        );
        $path = request()->file('image')->getClientOriginalName();
    }else{
        $path = $formation->image;
    }

    $formation->update([
          

        'nom' =>$data['nom'],
        'image' => $path,
        'description' => $data['description'],
        'mail_formateur' => $data['mail_formateur'],
        'nom_formateur' => $data['nom_formateur'],
        'formateur_profession' => $data['formateur_profession'],
        'location_formation' => $data['location_formation'],
        'prix_formation' => $data['prix_formation'],
        'duree_formation' => $data['duree_formation'],
        'session_id' => $data['session_id'],
    ]);
  

    return redirect('/formation');
}
public function show($id){

    $formations=Formation::find($id);
    return view('formations.show')->with('formations', $formations);

}




}
