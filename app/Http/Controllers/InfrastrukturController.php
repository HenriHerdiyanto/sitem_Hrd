<?php

namespace App\Http\Controllers;

use App\Models\Infrastruktur;
use Illuminate\Http\Request;

class InfrastrukturController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $infractions = Infrastruktur::all();
        return view("admin.infrastruktur.index", compact("infractions", "user"));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "user_id" => "required",
            "nomor" => "required",
            "tanggal" => "required",
            "infrastruktur" => "required",
            "ruangan" => "required",
            "jenis_perbaikan" => "required",
            "keterangan" => "required",
            "prepared" => "required",
        ]);
        $infractions = new Infrastruktur();
        $infractions->user_id = $validateData['user_id'];
        $infractions->nomor = $validateData['nomor'];
        $infractions->tanggal = $validateData['tanggal'];
        $infractions->infrastruktur = $validateData['infrastruktur'];
        $infractions->ruangan = $validateData['ruangan'];
        $infractions->jenis_perbaikan = $validateData['jenis_perbaikan'];
        $infractions->keterangan = $validateData['keterangan'];
        $infractions->prepared = $validateData['prepared'];
        $infractions->save();
        return redirect()->route('admin.infrastruktur.index')->with('success', 'ok');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            "user_id" => "required",
            "nomor" => "required",
            "tanggal" => "required",
            "infrastruktur" => "required",
            "ruangan" => "required",
            "jenis_perbaikan" => "required",
            "keterangan" => "required",
            "prepared" => "required",
        ]);

        // Find the Infrastruktur model by ID
        $infractions = Infrastruktur::find($id);

        if (!$infractions) {
            return back()->with('error', 'Record not found');
        }

        // Update the model attributes with the validated data
        $infractions->update($validatedData);

        return redirect()->route('admin.infrastruktur.index')->with('success', 'ok');
    }
    public function destroy($id)
    {
        $infractions = Infrastruktur::find($id);
        $infractions->delete();
        return redirect()->back()->with('success', 'ok');
    }
}
