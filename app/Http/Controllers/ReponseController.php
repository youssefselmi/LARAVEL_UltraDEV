<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
use App\Models\Reclamation;
use Illuminate\Support\Facades\DB;

class ReponseController extends Controller
{
    
    //


    
    
    public function index()
    {
        //  $less = DB::table('type_centres')->get();
        //    return dd($less);
     //   $les = DB::table('type_centres')->get();


        return view('reponses.reponse', [ 'reponses' => \App\Models\Reponse::all() ]);
    }



    
 



    public function add(Reclamation $reclamation,Request $request){


        

     /*   $url= \URL::current();
        dd($url);
        echo $url;*/

        $url= \URL::current();
        //dd($url);
           // echo $url;
          
          //  $key = array_search('repondre/', $url);
          //  dd($key);
           //  echo $key;
        
            $key=strpos($url,"e/");
        
            // dd($key);
            // echo $key;
        
             $key1=strpos($url,"4");
        
            // dd($key1);
            //echo $key1;
        
         //  dd(strlen($url));
        
           $var= substr($url, $key+2, strlen($url));
        
        //dd($var);
            //echo $var;












      

        $data = request()->validate([
            'reponse' =>'required',
            'reclamation_id' =>'required',
        ]
        
       
    );
    


    $path = $reclamation->id;

      //  $path = $centre->image;
    



        \App\Models\Reponse::create([
            'reponse' => $data['reponse'],
            'reclamation_id' => $data['reclamation_id'],
        ]);       
        return redirect('/reponse');
    }





    public function create(){

       // $donnes = DB::table('type_centres')->get();
        return view('reponses.reponse');
    }




    public function destroy(Reponse $reponse) {

        $reponse->delete();
        return redirect('/reponse');

    }





    public function getUpdate(Reponse $reponse){
        // $les = DB::table('type_centres')->get();
        //return dd($les);
        return view('reponses.modifierreponse', compact('reponse'));
    }




    public function update(Reponse $reponse,Request $request){

        $data = $request->validate([
            'reponse' =>'required',
            'reclamation_id' =>'required',
        ]
    );

      

        $reponse->update([
            'reponse' => $data['reponse'],
            'reclamation_id' => $data['reclamation_id'],
        ]);

        return redirect('/reponse');
    }





  /*  public function show($id){

            $centres=Centre::find($id);
            return view('centres.show')->with('centres', $centres);

    }
*/








public function getreponses()
{
  

 //dd($lesreponses);


 $url= \URL::current();
 //dd($url);
    // echo $url;
   
   //  $key = array_search('repondre/', $url);
   //  dd($key);
    //  echo $key;
 
     $key=strpos($url,"s/");
 
     // dd($key);
     // echo $key;
 
      //$key1=strpos($url,"4");
 
     // dd($key1);
     //echo $key1;
 
  //  dd(strlen($url));
 
    $var= substr($url, $key+2, strlen($url));
 
 //dd($var);
     //echo $var;
 
     $array = array(
         $var 
     ); 
     
     
     $lesreponses = DB::table('reponses')->get()->where('reclamation_id',$var);

    // dd($lesreponses);


    return view('reponses.showreponses', [ 'reponses' => \App\Models\Reponse::all() ]);
}










}
