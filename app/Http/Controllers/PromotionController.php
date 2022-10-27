<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\TypeCentre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    //


    public function index()
    {
        return view('promotions.promotion', ['promotions' => \App\Models\Promotion::all()]);
    }


    public function destroy(Promotion $promotion)
    {


        $donnes = DB::table('services')->get();

        foreach ($donnes as $lestypes) {

            if ($lestypes->promo_id == $promotion->id) {

                //   $lestypes->delete();
                DB::table('services')->where('promo_id', $promotion->id)->delete();
            }
        }

        

        $promotion->delete();

        return redirect('/promotion');


    }


    public function add()
    {


        $data = request()->validate([
            'promo' => 'required|min:4",'
        ],
            [
                'promo.required' => 'Remplir la promo ',
                'promo.min' => 'Min 4 char',
            ]


        );
        \App\Models\Promotion::create([

            'promo' => $data['promo'],
        ]);

        return redirect('/promotion');

    }


    public function create()
    {
        return view('promotions.addpromotion')->withSuccess(__('Post delete successfully.'));;
    }


    public function getUpdate(Promotion $promotion)
    {
        return view('promotions.modifierpromotion', compact('promotion'));
    }


    public function update(Promotion $promotion, Request $request)
    {

        $data = $request->validate([
            'promo' => 'required|min:2",'
        ],

            [
                'promo.required' => 'Remplir la promo ',
                'promo.min' => 'Min 2 char',

            ]
        );


        $promotion->update([
            'promo' => $data['promo'],
        ]);


        return redirect('/promotion');
    }


}
