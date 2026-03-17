<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WebController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function vat_rates()
    {
        $all = DB::table("vat_rates")->orderBy('id_vat_rate')->get();
        return view('vat_rates',compact('all'));
    }
    public function add_vat_rate(Request $request){
        DB::table("vat_rates")->insert([
            'percent'=>$request->percent,
        ]);
        return redirect()->back()->with('message','Запись добавлена');
    }
    public function edit_vat_rate(Request $request){
        DB::table("vat_rates")->where('id_vat_rate',$request->id_vat_rate)->update([
            'percent'=>$request->percent,
        ]);
        return redirect()->back()->with('message','Запись изменена');
    }
    public function del_vat_rate(Request $request){
        DB::table("vat_rates")->where('id_vat_rate',$request->id_vat_rate)->delete();
        return redirect()->back()->with('message','Запись удалена');
    }
}
