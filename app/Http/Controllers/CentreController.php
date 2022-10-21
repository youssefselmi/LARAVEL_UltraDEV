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
        return view('centres.centre', [ 'centres' => \App\Models\Centre::all() ]);
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
            'nom' =>'required',
            'image' => ['required', 'image'],
            'locale' =>'required',
            'type' =>'required',
        ],
        
        [
            'nom.required' =>'Remplir le nom ',
            'locale.required' =>'Remplir la locale ',
            'image.required' =>'Remplir image ',
            'type.required' =>'Remplir le type ',      
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
            'type' => $data['type'],
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
        return view('centres.modifiercentre', compact('centre'));
    }

    public function update(Centre $centre,Request $request){

        $data = $request->validate([
            'nom' =>'required',
            'image' => ['required', 'image'],
            'locale' =>'required',
            'type' =>'required',
        ],
        
        [
            'nom.required' =>'Remplir le nom ',
            'locale.required' =>'Remplir la locale ',
            'type.required' =>'Remplir le type ',      
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
            'type' => $data['type'],
        ]);

        return redirect('/Centre');
    }





    public function show($id){

            $centres=Centre::find($id);
            return view('centres.show')->with('centres', $centres);

    }












}
