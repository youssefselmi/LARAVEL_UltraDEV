<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    //


    public function index()
    {
        $less = DB::table('promotions')->get();


        //    return dd($less);
        //   $les = DB::table('type_centres')->get();
        return view('services.service', ['services' => \App\Models\Service::all()], compact('less'));
    }


    public function index2()
    {
        return view('services.gridservice', ['services' => \App\Models\Service::all()]);
    }


    public function getpromotions()
    {
        return view('services.addservice', ['po' => \App\Models\Promotion::all()]);
    }


    public function add()
    {


        $data = request()->validate([
            'nom' => 'required|min:2',
            'image' => ['required', 'image'],
            'locale' => 'required|min:2',
            'promo_id' => '',
            'desc' => '',
            'tel' => '',
            'price' => ''
        ],

            [
                'nom.required' => 'Nom obligatoire ',
                'locale.required' => 'locale obligatoire ',
                'image.required' => 'image obligatoire ',


            ]
        );
        request()->file('image')->move(
            public_path('storage/imgs'),
            request()->file('image')->getClientOriginalName()
        );

        \App\Models\Service::create([
            'nom' => $data['nom'],
            'image' => $data['image']->getClientOriginalName(),
            'locale' => $data['locale'],
            'promo_id' => $data['promo_id'],
            'desc' => $data['desc'],
            'tel' => $data['tel'],
            'price' => $data['price'],
        ]);


        return redirect('/service');

    }


    public function create()
    {

        $donnes = DB::table('promotions')->get();
        return view('services.addservice');
    }


    public function destroy(Service $service)
    {

        $service->delete();
        return redirect('/service');

    }


    public function getUpdate(Service $service)
    {
        $les = DB::table('promotions')->get();
        //return dd($les);
        return view('services.modifierservice', compact('service'), compact('les'));
    }

    public function update(Service $service, Request $request)
    {

        $data = $request->validate([
            'nom' => 'required|min:2',
            'image' => ['required', 'image'],
            'locale' => 'min:2',
            'promo_id' => '',
            'desc' => 'required|min:2',
            'tel' => 'required|min:2',
            'price' => 'required|min:2'
        ],

            [
                'nom.required' => 'Nom obligatoire ',

                'image.required' => 'image obligatoire ',
                'desc.required' => 'desc obligatoire ',
                'tel.required' => 'tel obligatoire ',
                'price.required' => 'price obligatoire ',
            ]
        );

        $path = '';
        if (request()->hasFile('image')) {
            request()->file('image')->move(
                public_path('storage/imgs'),
                request()->file('image')->getClientOriginalName()
            );
            $path = request()->file('image')->getClientOriginalName();
        } else {
            $path = $service->image;
        }

        $service->update([
            'nom' => $data['nom'],
            'image' => $path,
            'locale' => $data['locale'],
            'promo_id' => $data['promo_id'],
            'desc' => $data['desc'],
            'tel' => $data['tel'],
            'price' => $data['price'],
        ]);

        return redirect('/service');
    }


    public function show($id)
    {

        $services = Service::find($id);
        return view('services.show')->with('services', $services);

    }


}
