<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\Reimbursement;
use Illuminate\Http\Request;

class ReimbursementController extends Controller
{

    public function financeHome()
    {
        $user = auth()->user();
        $reimbursements = Reimbursement::all();

        return view("finance.home", compact("reimbursements"));
    }

    public function financeedit($id)
    {
        $user = auth()->user();
        $divisi = Divisi::all();
        $reimbursement = Reimbursement::find($id);
        return view("finance.edit", compact("user", "reimbursement", "divisi"));
    }

    public function financeupdate(Request $request, $id)
    {
        $reimbursement = Reimbursement::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "tanggal" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "persetujuan_atasan" => "required",
            "persetujuan_finance" => "required",
        ]);
        $reimbursement->update($validateData);
        return redirect()->route("finance.home")->with("success", "ok");
    }


    public function userindex()
    {
        $user = auth()->user();
        $reimbursements = $user->reimbursement;

        return view("user.reimbursements.index", compact("reimbursements"));
    }

    public function usercreate()
    {
        $user = auth()->user();
        return view("user.reimbursements.create", compact("user"));
    }

    public function userstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "tanggal" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "persetujuan_atasan" => "required",
            "persetujuan_finance" => "required",
        ]);
        $reimbursement = new Reimbursement($validateData);
        $reimbursement->save();
        return redirect()->route("user.reimbursements.index")->with("success", "ok");
    }

    public function useredit($id)
    {
        $user = auth()->user();
        $reimbursement = Reimbursement::find($id);
        return view("user.reimbursements.edit", compact("user", "reimbursement"));
    }

    public function usercetak($id)
    {
        $user = auth()->user();
        $reimbursement = Reimbursement::find($id);
        return view("user.reimbursements.cetak", compact("user", "reimbursement"));
    }

    public function userupdate(Request $request, $id)
    {
        $reimbursement = Reimbursement::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "tanggal" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "persetujuan_atasan" => "required",
            "persetujuan_finance" => "required",
        ]);
        $reimbursement->update($validateData);
        return redirect()->route("user.reimbursements.index")->with("success", "ok");
    }

    public function userdestroy($id)
    {
        $reimbursement = Reimbursement::find($id);
        $reimbursement->delete();
        return redirect()->route("user.reimbursements.index")->with("success", "ok");
    }

    // ======================================================================================================================================


    public function index()
    {
        // Mengambil data reimbursements yang memiliki user_id sama dengan yang sedang login
        $reimbursements = Reimbursement::where('user_id', auth()->user()->id)->get();
        return view("manager.reimbursements.index", compact("reimbursements"));
    }

    public function create()
    {
        $user = auth()->user();
        return view("manager.reimbursements.create", compact("user"));
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "tanggal" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "persetujuan_atasan" => "required",
            "persetujuan_finance" => "required",
        ]);
        $reimbursement = new Reimbursement($validateData);
        $reimbursement->save();
        return redirect()->route("reimbursements.index")->with("success", "ok");
    }

    public function edit($id)
    {
        $user = auth()->user();
        $reimbursement = Reimbursement::find($id);
        return view("manager.reimbursements.edit", compact("user", "reimbursement"));
    }
    public function update(Request $request, $id)
    {
        $reimbursement = Reimbursement::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "tanggal" => "required",
            "keterangan" => "required",
            "jumlah" => "required",
            "persetujuan_atasan" => "required",
            "persetujuan_finance" => "required",
        ]);
        $reimbursement->update($validateData);
        return redirect()->route("reimbursements.index")->with("success", "ok");
    }
    public function destroy($id)
    {
        $reimbursement = Reimbursement::find($id);
        $reimbursement->delete();
        return redirect()->route("reimbursements.index")->with("success", "ok");
    }
}
