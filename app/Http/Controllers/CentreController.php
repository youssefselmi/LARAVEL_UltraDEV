<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

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





    public function add(){
        $data = request()->validate([
            'nom' =>'required',
            'image' => ['required', 'image'],
            'locale' =>'required',
            'type' =>'required',
        ]);

        request()->file('image')->move(
            public_path('storage/imgs'),
            request()->file('image')->getClientOriginalName()
        );

        // $photo = request()->photo;

        // dd(request()->hasFile('photo'));
        // dd($photo);

        \App\Models\Centre::create([
            'nom' => $data['nom'],
            'image' => $data['image']->getClientOriginalName(),
            'locale' => $data['locale'],
            'type' => $data['type'],
        ]);

        return redirect('/Centre');

    }




    public function create(){

        return view('centres.addcentre');

    }




    public function destroy(Centre $centre) {
        
        $centre->delete();
        return redirect('/Centre');

    }









/*

    public function destroy($id)
    {

        $centre = Centre::findOrFail($id);
        $centre->delete();

        return redirect('/centre')->with('success', 'Personnage Modifié avec succès');

    }

*/



    public function getUpdate(Centre $centre){
        return view('centres.modifiercentre', compact('centre'));
    }

    public function update(Centre $centre){

        $data = request()->validate([
            'nom' =>'required',
            'image' => ['required', 'image'],
            'locale' =>'required',
            'type' =>'required',
        ]);

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














}
