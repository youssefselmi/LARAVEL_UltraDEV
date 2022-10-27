<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\TypeAppointment;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    //


    
    public function index()
    {
          $less = DB::table('type_appointments')->get();

          
        //    return dd($less);
     //   $les = DB::table('type_appointments')->get();
        return view('appointments.appointment', [ 'appointments' => \App\Models\Appointment::all() ], compact('less'));
    }




     
    public function index2()
    {
        return view('appointments.gridappointment', [ 'appointments' => \App\Models\Appointment::all() ]);
    }


    



     
    public function gettypes()
    {
        return view('appointments.addappointment', [ 'po' => \App\Models\TypeAppointment::all() ]);
    }


    
 



    public function add(){


        $data = request()->validate([
            'with' =>'required|alpha|min:2',
            'for' => 'required|alpha|min:2',
            'reason' =>'required|alpha|min:2',
            'date' =>'required',
            'type_id' =>'',
        ],
        
        [
            'with.required' =>'Remplir le nom ',
            'for.required' =>'Remplir la locale ',
            'reason.required' =>'Remplir image ',
            'date.required' =>'Remplir image ',
            
            'with.alpha' =>'Locale ne doit pas contenir des caracteres speciaux ',
            'for.alpha' =>'Locale ne doit pas contenir des caracteres speciaux ',


        ]  
    );
        // request()->file('image')->move(
        //     public_path('storage/imgs'),
        //     request()->file('image')->getClientOriginalName()
        // );

        \App\Models\Appointment::create([
            'with' => $data['with'],
            // 'image' => $data['image']->getClientOriginalName(),
            'for' => $data['for'],
            'reason' => $data['reason'],
            'date' => $data['date'],
            'type_id' => $data['type_id'],
        ]);


        
        return redirect('/Appointment');

    }




    public function create(){

        $donnes = DB::table('type_appointments')->get();
        return view('appointments.addappointment');
    }




    public function destroy(Appointment $appointment) {

        $appointment->delete();
        return redirect('/Appointment');

    }









    public function getUpdate(Appointment $appointment){
         $les = DB::table('type_appointments')->get();
        //return dd($les);
        return view('appointments.modifierappointment', compact('appointment'), compact('les'));
    }
    
    public function update(Appointment $appointment,Request $request){

        $data = $request->validate([
            'with' =>'required|alpha|min:2',
            'for' => 'required|alpha|min:2',
            'reason' =>'required|alpha|min:2',
            'date' =>'required',
            'type_id' =>'',
        ],
        
        [
            'with.required' =>'Remplir ce champ ',
            'for.required' =>'Remplir ce champ ',
            'reason.required' =>'Remplir la raison ',
         
            'with.alpha' =>'Locale ne doit pas contenir des caracteres speciaux ',
            'for.alpha' =>'Locale ne doit pas contenir des caracteres speciaux ',
        ]  
    );



        // $path = '';
        // if (request()->hasFile('image')){
        //     request()->file('image')->move(
        //         public_path('storage/imgs'),
        //         request()->file('image')->getClientOriginalName()
        //     );
        //     $path = request()->file('image')->getClientOriginalName();
        // }else{
        //     $path = $appointment->image;
        // }

        $appointment->update([
            'with' => $data['with'],
            // 'image' => $data['image']->getClientOriginalName(),
            'for' => $data['for'],
            'reason' => $data['reason'],
            'date' => $data['date'],
            'type_id' => $data['type_id'],
        ]);

        return redirect('/Appointment');
    }





    public function show($id){

            $appointments=Appointment::find($id);
            return view('appointments.show')->with('appointments', $appointments);

    }












}
