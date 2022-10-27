<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reclamation;

class ReclamationController extends Controller
{

    

    public function index()
    {
        $reclamations = DB::table('reclamations')->get();

       // $reclamations = json_incode($rec, true);

       // return($rec);
        return view('reclamation.reclamation', [ 'reclamations' => \App\Models\Reclamation::all() ]);
    }




    public function add(){


        $data = request()->validate([
            'nom' =>'required',
            'image' => ['required', 'image'],
           // 'date' =>'',
            'description' =>'required',
            'mail' =>'required|email',

        ],
        
        [
            'nom.required' =>'Remplir le nom ',
            'description.required' =>'Remplir description ',
            'mail.required' =>'Remplir mail ',


        ]  
    );
        request()->file('image')->move(
            public_path('storage/imgs'),
            request()->file('image')->getClientOriginalName()
        );

        $date = date('Y-m-d H:i:s');


        \App\Models\Reclamation::create([
            'nom' => $data['nom'],
            'image' => $data['image']->getClientOriginalName(),
            'date' => $date,
            'description' => $data['description'],
            'mail' => $data['mail'],

        ]);


        
        return redirect('/frontoffice');

    }



    public function create(){

        return view('reclamation.addreclamation');
    }






    public function destroy(Reclamation $reclamation) {

        $reclamation->delete();
        return redirect('/reclamation');

    }









}
