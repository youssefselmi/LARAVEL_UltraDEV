<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

class CentreController extends Controller
{
   

    public function index()
    {
        return view('centres.centre', [ 'centres' => \App\Models\Centre::all() ]);
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









}
