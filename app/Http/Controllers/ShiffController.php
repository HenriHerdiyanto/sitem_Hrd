<?php

namespace App\Http\Controllers;

use App\Models\Shiff;
use App\Models\User;
use Illuminate\Http\Request;

class ShiffController extends Controller
{
    public function index()
    {
        // Mengambil semua pengguna dengan tipe (type) 0 atau 2
        $user = User::whereIn('type', [2, 0])->orderBy('type')->get();
        $shiff = Shiff::all();
        return view("admin.shiff.index", compact("shiff", "user"));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "shiff" => "required",
        ]);
        $shiff = new Shiff();
        $shiff->user_id = $validateData['user_id'];
        $shiff->shiff = $validateData['shiff'];
        $shiff->save();
        return redirect()->back()->with('success', 'ok');
    }

    public function edit($id)
    {
        $user = User::all();
        $shiff = Shiff::find($id);
        return view('admin.shiff.edit', compact('shiff'));
    }
    public function update(Request $request, $id)
    {
        $shiff = Shiff::find($id);
        $validateData = $request->validate([
            'user_id' => 'required',
            'shiff' => 'required',
        ]);
        $shiff = Shiff::findOrFail($id);
        $shiff->user_id = $validateData['user_id'];
        $shiff->shiff = $validateData['shiff'];
        $shiff->save();
        return redirect()->route('shiff.index')->with('success', 'ok');
    }

    public function destroy($id)
    {
        $shiff = Shiff::find($id);
        $shiff->delete();
        return redirect()->back()->with('success', 'ok');
    }
}
