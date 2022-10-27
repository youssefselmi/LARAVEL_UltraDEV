<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reponse;
use App\Models\Reclamation;
use Illuminate\Support\Facades\DB;

class ReponseController extends Controller
{
    
    //


    
    
    // public function index()
    // {
    //     //  $less = DB::table('type_centres')->get();
    //     //    return dd($less);
    //  //   $les = DB::table('type_centres')->get();


    //     return view('reponses.reponse', [ 'reponses' => \App\Models\Reponse::all() ]);
    // }



    
 



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
        return redirect('/reclamation');
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

        

 $url= \URL::current();

//   dd($url);
      $key=strpos($url,"e/");
 
  
     $var= substr($url, $key+2, strlen($url));
  
// dd($var);
  
        return redirect("/reponses"."/".$var);
    }





  /*  public function show($id){

            $centres=Centre::find($id);
            return view('centres.show')->with('centres', $centres);

    }
*/





function toObject($arr) {
    if (is_array($arr)) {
        // Return object 
        return (object) array_map('toObject', $arr);
    }
     return false;
}


public function index()
{
  




 $url= \URL::current();

//  dd($url);
     $key=strpos($url,"s/");

 
    $var= substr($url, $key+2, strlen($url));
 
     $array = array(
         $var 
     ); 
     
     $reponses = DB::table('reponses')->where('reclamation_id',$var)->get();
    //  $data1 = json_decode($data, true);

$reponses=Reponse::all()->where('reclamation_id',$var);
// dd($reponses);
return view('reponses.reponse', compact('reponses'));

}










}
