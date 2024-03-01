<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shiff;
use Illuminate\Http\Request;

class ShiffController extends Controller
{
    public function index()
    {
        $shiff = Shiff::paginate(10);
        return response()->json([
            "data" => $shiff
        ]);
    }

    public function store(Request $request)
    {
        $shiff = Shiff::create([
            "user_id" => $request->user_id,
            "shiff" => $request->shiff,
        ]);
        return response()->json([
            "data" => $shiff
        ]);
    }

    public function show(Shiff $shiff)
    {
        return response()->json([
            "data" => $shiff
        ]);
    }

    public function update(Request $request, Shiff $shiff)
    {
        $shiff->user_id = $request->user_id;
        $shiff->shiff = $request->shiff;
        $shiff->save();
        return response()->json([
            "data" => $shiff
        ]);
    }

    public function destroy(Shiff $shiff)
    {
        $shiff->delete();
        return response()->json([
            "message" => "shiff delete"
        ], 204);
    }
}
