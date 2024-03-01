<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Models\Todolist;
use App\Models\Evaluasi;
use App\Models\User;
use App\Models\Cuti;
use App\Models\PerjalananDinas;
use App\Models\Budget;
use App\Models\Pinjaman;
use App\Models\Lembur;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $todolists = $user->todolists;

        return view("admin.home", compact("todolists"));
    }

    public function Userindex()
    {
        $user = auth()->user();
        $todolists = $user->todolists;
        // dd($todolists);
        return view("user.home", compact("todolists"));
    }

    public function Userstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "judul" => "required",
            "keterangan" => "required",
        ]);
        $todolist = new Todolist();
        $todolist->user_id = $validateData['user_id'];
        $todolist->judul = $validateData['judul'];
        $todolist->keterangan = $validateData['keterangan'];
        $todolist->save();
        return redirect()->route('home')->with('success', 'ok');
    }

    public function Userupdate(Request $request, $id)
    {
        $todolist = Todolist::find($id);
        $validateData = $request->validate([
            'user_id' => 'required',
            "judul" => "nullable",
            "keterangan" => "nullable",
        ]);
        $todolist = Todolist::findOrFail($id);
        $todolist->user_id = $validateData["user_id"];
        $todolist->judul = $validateData["judul"];
        $todolist->keterangan = $validateData["keterangan"];
        $todolist->save();
        return redirect()->route("home")->with("success", 'ok');
    }

    public function Userdestroy($id)
    {
        $todolist = Todolist::find($id);

        if (!$todolist) {
            return redirect()->route('home')->with('error', 'Todolist tidak ditemukan');
        }

        $todolist->delete();

        return redirect()->route('home')->with('success', 'Todolist berhasil dihapus');
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "judul" => "required",
            "keterangan" => "required",
        ]);
        $todolist = new Todolist();
        $todolist->user_id = $validateData['user_id'];
        $todolist->judul = $validateData['judul'];
        $todolist->keterangan = $validateData['keterangan'];
        $todolist->save();
        return redirect()->route('admin.home')->with('success', 'ok');
    }

    public function Managerstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "judul" => "required",
            "keterangan" => "required",
        ]);
        $todolist = new Todolist();
        $todolist->user_id = $validateData['user_id'];
        $todolist->judul = $validateData['judul'];
        $todolist->keterangan = $validateData['keterangan'];
        $todolist->save();
        return redirect()->route('manager.home')->with('success', 'ok');
    }

    public function update(Request $request, $id)
    {
        $todolist = Todolist::find($id);
        $validateData = $request->validate([
            'user_id' => 'required',
            "judul" => "nullable",
            "keterangan" => "nullable",
        ]);
        $todolist = Todolist::findOrFail($id);
        $todolist->user_id = $validateData["user_id"];
        $todolist->judul = $validateData["judul"];
        $todolist->keterangan = $validateData["keterangan"];
        $todolist->save();
        return redirect()->route("admin.home")->with("success", 'ok');
    }

    public function Managerupdate(Request $request, $id)
    {
        $todolist = Todolist::find($id);
        $validateData = $request->validate([
            'user_id' => 'required',
            "judul" => "nullable",
            "keterangan" => "nullable",
        ]);
        $todolist = Todolist::findOrFail($id);
        $todolist->user_id = $validateData["user_id"];
        $todolist->judul = $validateData["judul"];
        $todolist->keterangan = $validateData["keterangan"];
        $todolist->save();
        return redirect()->route("manager.home")->with("success", 'ok');
    }
    public function destroy($id)
    {
        $todolist = Todolist::destroy($id);
        return redirect()->route('admin.home')->with('success', 'Todolist berhasil dihapus');
    }
    public function Managerdestroy($id)
    {
        $todolist = Todolist::destroy($id);
        return redirect()->route('manager.home')->with('success', 'Todolist berhasil dihapus');
    }
}
