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
        return view('vat_rates', compact('all'));
    }

    public function add_vat_rate(Request $request)
    {
        DB::table("vat_rates")->insert([
            'percent' => $request->percent,
        ]);
        return redirect()->back()->with('message', 'Запись добавлена');
    }

    public function edit_vat_rate(Request $request)
    {
        DB::table("vat_rates")->where('id_vat_rate', $request->id_vat_rate)->update([
            'percent' => $request->percent,
        ]);
        return redirect()->back()->with('message', 'Запись изменена');
    }

    public function del_vat_rate(Request $request)
    {
        DB::table("vat_rates")->where('id_vat_rate', $request->id_vat_rate)->delete();
        return redirect()->back()->with('message', 'Запись удалена');
    }

    public function stages_of_execution()
    {
        $all = DB::table("stages_of_execution")->orderBy('id_stage_of_execution')->get();
        return view('stages_of_execution', compact('all'));
    }

    public function add_stage_of_execution(Request $request)
    {
        DB::table("stages_of_execution")->insert([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message', 'Запись добавлена');
    }

    public function edit_stage_of_execution(Request $request)
    {
        DB::table("stages_of_execution")->where('id_stage_of_execution', $request->id_stage_of_execution)->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message', 'Запись изменена');
    }

    public function del_stage_of_execution(Request $request)
    {
        DB::table("stages_of_execution")->where('id_stage_of_execution', $request->id_stage_of_execution)->delete();
        return redirect()->back()->with('message', 'Запись удалена');
    }

    public function types_of_contracts()
    {
        $all = DB::table("types_of_contracts")->orderBy('id_type_of_contract')->get();
        return view('types_of_contracts', compact('all'));
    }

    public function add_type_of_contract(Request $request)
    {
        DB::table("types_of_contracts")->insert([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message', 'Запись добавлена');
    }

    public function edit_type_of_contract(Request $request)
    {
        DB::table("types_of_contracts")->where('id_type_of_contract', $request->id_type_of_contract)->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message', 'Запись изменена');
    }

    public function del_type_of_contract(Request $request)
    {
        DB::table("types_of_contracts")->where('id_type_of_contract', $request->id_type_of_contract)->delete();
        return redirect()->back()->with('message', 'Запись удалена');
    }

    public function types_of_payments()
    {
        $all = DB::table("types_of_payments")->orderBy('id_type_of_payment')->get();
        return view('types_of_payments', compact('all'));
    }

    public function add_type_of_payment(Request $request)
    {
        DB::table("types_of_payments")->insert([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message', 'Запись добавлена');
    }

    public function edit_type_of_payment(Request $request)
    {
        DB::table("types_of_payments")->where('id_type_of_payment', $request->id_type_of_payment)->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with('message', 'Запись изменена');
    }

    public function del_type_of_payment(Request $request)
    {
        DB::table("types_of_payments")->where('id_type_of_payment', $request->id_type_of_payment)->delete();
        return redirect()->back()->with('message', 'Запись удалена');
    }

    public function organizations(Request $request)
    {
        $all = DB::table("organizations")->orderBy('id_organization');
        $search = '';
        if (isset($request->search)) {
            $all = $all->where('name', 'like', '%' . $request->search . '%');
            $search = $request->search;
        }

        $all = $all->get();
        return view('organizations', compact('all', 'search'));
    }

    public function add_organization(Request $request)
    {
        DB::table("organizations")->insert([
            'name' => $request->name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'fax_number' => $request->fax_number,
            'tin' => $request->tin,
            'correspondent_account' => $request->correspondent_account,
            'bank' => $request->bank,
            'payment_account' => $request->payment_account,
            'okonh' => $request->okonh,
            'okpo' => $request->okpo,
            'bic' => $request->bic,
        ]);
        return redirect()->back()->with('message', 'Запись добавлена');
    }

    public function edit_organization(Request $request)
    {
        DB::table("organizations")->where('id_organization', $request->id_organization)->update([
            'name' => $request->name,
            'postcode' => $request->postcode,
            'address' => $request->address,
            'telephone' => $request->telephone,
            'fax_number' => $request->fax_number,
            'tin' => $request->tin,
            'correspondent_account' => $request->correspondent_account,
            'bank' => $request->bank,
            'payment_account' => $request->payment_account,
            'okonh' => $request->okonh,
            'okpo' => $request->okpo,
            'bic' => $request->bic,
        ]);
        return redirect()->back()->with('message', 'Запись изменена');
    }

    public function del_organization(Request $request)
    {
        DB::table("organizations")->where('id_organization', $request->id_organization)->delete();
        return redirect()->back()->with('message', 'Запись удалена');
    }
}
