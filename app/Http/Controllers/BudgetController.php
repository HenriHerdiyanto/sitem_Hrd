<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use App\Models\User;
use App\Models\Budget;
use Illuminate\Http\Request;

class BudgetController extends Controller
{

    public function Adminindex()
    {
        $user = User::all();
        $divisi = Divisi::all();
        $budget = Budget::all();
        return view("admin.budget.index", compact("budget", "divisi", "user"));
    }

    public function Userindex()
    {
        $user = auth()->user();
        $budgets = $user->budgets;
        $divisi = $user->divisi;
        // dd($budgets);
        return view("user.budget.index", compact("budgets", "divisi"));
    }


    public function Usercreate()
    {
        $users = User::find(auth()->user()->id);
        $divisi = Divisi::all();
        return view("user.budget.create", compact("divisi", "users"));
    }

    public function Userstore(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "jenis_item" => "required",
            "tanggal" => "required",
            "judul_request" => "required",
            "barang1" => "nullable",
            "harga1" => "nullable",
            "barang2" => "nullable",
            "harga2" => "nullable",
            "barang3" => "nullable",
            "harga3" => "nullable",
            "barang4" => "nullable",
            "harga4" => "nullable",
            "total_harga" => "nullable",
            "status" => "nullable",
        ]);

        $budget = new Budget();
        $budget->user_id = $validateData['user_id'];
        $budget->divisi_id = $validateData['divisi_id'];
        $budget->jenis_item = $validateData['jenis_item'];
        $budget->tanggal = $validateData['tanggal'];
        $budget->judul_request = $validateData['judul_request'];
        $budget->barang1 = $validateData['barang1'];
        $budget->harga1 = $validateData['harga1'];
        $budget->barang2 = $validateData['barang2'];
        $budget->harga2 = $validateData['harga2'];
        $budget->barang3 = $validateData['barang3'];
        $budget->harga3 = $validateData['harga3'];
        $budget->barang4 = $validateData['barang4'];
        $budget->harga4 = $validateData['harga4'];
        $budget->total_harga = $validateData['total_harga'];
        $budget->status = $validateData['status'];
        $budget->save();

        return redirect()->route('user.budget.index')->with('success', 'ok');
    }

    public function Useredit($id)
    {
        $users = User::find(auth()->user()->id);
        $budget = Budget::findOrFail($id);
        return view('user.budget.edit', compact('budget', 'users'));
    }

    public function Userupdate(Request $request, $id)
    {
        $budget = Budget::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "jenis_item" => "required",
            "tanggal" => "required",
            "judul_request" => "required",
            "barang1" => "nullable",
            "harga1" => "nullable",
            "barang2" => "nullable",
            "harga2" => "nullable",
            "barang3" => "nullable",
            "harga3" => "nullable",
            "barang4" => "nullable",
            "harga4" => "nullable",
            "total_harga" => "nullable",
            "status" => "nullable",
        ]);
        $budget = Budget::findOrFail($id);
        $budget->user_id = $validateData['user_id'];
        $budget->divisi_id = $validateData['divisi_id'];
        $budget->jenis_item = $validateData['jenis_item'];
        $budget->tanggal = $validateData['tanggal'];
        $budget->judul_request = $validateData['judul_request'];
        $budget->barang1 = $validateData['barang1'];
        $budget->harga1 = $validateData['harga1'];
        $budget->barang2 = $validateData['barang2'];
        $budget->harga2 = $validateData['harga2'];
        $budget->barang3 = $validateData['barang3'];
        $budget->harga3 = $validateData['harga3'];
        $budget->barang4 = $validateData['barang4'];
        $budget->harga4 = $validateData['harga4'];
        $budget->total_harga = $validateData['total_harga'];
        $budget->status = $validateData['status'];
        $budget->save();

        return redirect()->route('user.budget.index')->with('success', 'ok');
    }

    public function Userdestroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();
        return redirect()->route('user.budget.index')->with('success', 'ok');
    }


    // ======================================================================================================================================
    public function index()
    {
        // Mengambil user_id pengguna yang sedang login
        $userId = auth()->user()->id;
        // Mengambil data pengguna yang akan ditampilkan
        $user = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();

        // Mengambil data budget
        $budget = Budget::all();

        return view("manager.request_budget.index", compact("budget", "divisi", "user"));
    }


    public function create()
    {
        $userId = auth()->user()->id;
        // Mengambil data pengguna yang akan ditampilkan
        $users = User::find($userId);

        // Mengambil data divisi
        $divisi = Divisi::all();

        return view("manager.request_budget.create", compact("divisi", "users"));
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "jenis_item" => "required",
            "tanggal" => "required",
            "judul_request" => "required",
            "barang1" => "nullable",
            "harga1" => "nullable",
            "barang2" => "nullable",
            "harga2" => "nullable",
            "barang3" => "nullable",
            "harga3" => "nullable",
            "barang4" => "nullable",
            "harga4" => "nullable",
            "total_harga" => "nullable",
            "status" => "nullable",
        ]);

        $budget = new Budget();
        $budget->user_id = $validateData['user_id'];
        $budget->divisi_id = $validateData['divisi_id'];
        $budget->jenis_item = $validateData['jenis_item'];
        $budget->tanggal = $validateData['tanggal'];
        $budget->judul_request = $validateData['judul_request'];
        $budget->barang1 = $validateData['barang1'];
        $budget->harga1 = $validateData['harga1'];
        $budget->barang2 = $validateData['barang2'];
        $budget->harga2 = $validateData['harga2'];
        $budget->barang3 = $validateData['barang3'];
        $budget->harga3 = $validateData['harga3'];
        $budget->barang4 = $validateData['barang4'];
        $budget->harga4 = $validateData['harga4'];
        $budget->total_harga = $validateData['total_harga'];
        $budget->status = $validateData['status'];
        $budget->save();

        return redirect()->route('admin.budget.index')->with('success', 'ok');
    }


    public function edit($id)
    {
        $userId = auth()->user()->id;
        // Mengambil data pengguna yang akan diedit
        $users = User::find($userId);

        // Mengambil data budget berdasarkan id yang akan diedit
        $budget = Budget::findOrFail($id);

        return view('manager.request_budget.edit', compact('budget', 'users'));
    }


    public function Adminedit($id)
    {
        // Retrieve the specific budget based on $id
        $budget = Budget::find($id);

        // Check if the budget with the given $id exists
        if (!$budget) {
            // Handle the case where the budget doesn't exist, e.g., show an error message or redirect
        }

        // Get the associated user for this budget
        $user = $budget->user;

        return view('admin.budget.edit', compact('budget', 'user'));
    }



    public function update(Request $request, $id)
    {
        $budget = Budget::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "jenis_item" => "required",
            "tanggal" => "required",
            "judul_request" => "required",
            "barang1" => "nullable",
            "harga1" => "nullable",
            "barang2" => "nullable",
            "harga2" => "nullable",
            "barang3" => "nullable",
            "harga3" => "nullable",
            "barang4" => "nullable",
            "harga4" => "nullable",
            "total_harga" => "nullable",
            "status" => "nullable",
        ]);
        $budget = Budget::findOrFail($id);
        $budget->user_id = $validateData['user_id'];
        $budget->divisi_id = $validateData['divisi_id'];
        $budget->jenis_item = $validateData['jenis_item'];
        $budget->tanggal = $validateData['tanggal'];
        $budget->judul_request = $validateData['judul_request'];
        $budget->barang1 = $validateData['barang1'];
        $budget->harga1 = $validateData['harga1'];
        $budget->barang2 = $validateData['barang2'];
        $budget->harga2 = $validateData['harga2'];
        $budget->barang3 = $validateData['barang3'];
        $budget->harga3 = $validateData['harga3'];
        $budget->barang4 = $validateData['barang4'];
        $budget->harga4 = $validateData['harga4'];
        $budget->total_harga = $validateData['total_harga'];
        $budget->status = $validateData['status'];
        $budget->save();

        return redirect()->route('budget.index')->with('success', 'ok');
    }

    public function Adminupdate(Request $request, $id)
    {
        $budget = Budget::find($id);
        $validateData = $request->validate([
            "user_id" => "required",
            "divisi_id" => "required",
            "jenis_item" => "required",
            "tanggal" => "required",
            "judul_request" => "required",
            "barang1" => "nullable",
            "harga1" => "nullable",
            "barang2" => "nullable",
            "harga2" => "nullable",
            "barang3" => "nullable",
            "harga3" => "nullable",
            "barang4" => "nullable",
            "harga4" => "nullable",
            "total_harga" => "nullable",
            "status" => "nullable",
        ]);
        $budget = Budget::findOrFail($id);
        $budget->user_id = $validateData['user_id'];
        $budget->divisi_id = $validateData['divisi_id'];
        $budget->jenis_item = $validateData['jenis_item'];
        $budget->tanggal = $validateData['tanggal'];
        $budget->judul_request = $validateData['judul_request'];
        $budget->barang1 = $validateData['barang1'];
        $budget->harga1 = $validateData['harga1'];
        $budget->barang2 = $validateData['barang2'];
        $budget->harga2 = $validateData['harga2'];
        $budget->barang3 = $validateData['barang3'];
        $budget->harga3 = $validateData['harga3'];
        $budget->barang4 = $validateData['barang4'];
        $budget->harga4 = $validateData['harga4'];
        $budget->total_harga = $validateData['total_harga'];
        $budget->status = $validateData['status'];
        $budget->save();

        return redirect()->route('admin.budget.index')->with('success', 'ok');
    }

    public function destroy($id)
    {
        $budget = Budget::findOrFail($id);
        $budget->delete();
        return redirect()->route('budget.index')->with('success', 'ok');
    }
}
