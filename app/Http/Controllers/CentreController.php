<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;
use App\Models\TypeCentre;
use Illuminate\Support\Facades\DB;

class CentreController extends Controller
{
    //


    
    public function index()
    {
          $less = DB::table('type_centres')->get();

          
        //    return dd($less);
     //   $les = DB::table('type_centres')->get();
        return view('centres.centre', [ 'centres' => \App\Models\Centre::all() ], compact('less'));
    }




     
    public function index2()
    {
        return view('centres.gridcentre', [ 'centres' => \App\Models\Centre::all() ]);
    }


    



     
    public function gettypes()
    {
        return view('centres.addcentre', [ 'po' => \App\Models\TypeCentre::all() ]);
    }


    
 



    public function add(){


        $data = request()->validate([
            'nom' =>'required|min:2',
            'image' => ['required', 'image'],
            'locale' =>'required|min:2',
            'type_id' =>'',
        ],
        
        [
            'nom.required' =>'Nom obligatoire ',
            'locale.required' =>'locale obligatoire ',
            'image.required' =>'image obligatoire ',
            
       


        ]  
    );
        request()->file('image')->move(
            public_path('storage/imgs'),
            request()->file('image')->getClientOriginalName()
        );

        \App\Models\Centre::create([
            'nom' => $data['nom'],
            'image' => $data['image']->getClientOriginalName(),
            'locale' => $data['locale'],
            'type_id' => $data['type_id'],
        ]);


        
        return redirect('/Centre');

    }




    public function create(){

        $donnes = DB::table('type_centres')->get();
        return view('centres.addcentre');
    }




    public function destroy(Centre $centre) {

        $centre->delete();
        return redirect('/Centre');

    }









    public function getUpdate(Centre $centre){
         $les = DB::table('type_centres')->get();
        //return dd($les);
        return view('centres.modifiercentre', compact('centre'), compact('les'));
    }

    public function update(Centre $centre,Request $request){

        $data = $request->validate([
            'nom' =>'required|min:2',
            'image' => ['required', 'image'],
            'locale' =>'required|min:2',
            'type_id' =>'',
        ],
        
        [
            'nom.required' =>'Nom obligatoire ',
            'locale.required' =>'locale obligatoire ',
            'image.required' =>'image obligatoire ', 
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
            $path = $centre->image;
        }

        $centre->update([
            'nom' => $data['nom'],
            'image' => $path,
            'locale' => $data['locale'],
            'type_id' => $data['type_id'],
        ]);

        return redirect('/Centre');
    }





    public function show($id){

            $centres=Centre::find($id);
            return view('centres.show')->with('centres', $centres);

    }












}
