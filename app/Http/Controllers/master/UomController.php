<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\Uom;
use Illuminate\Http\Request;

class UomController extends Controller
{
    public function index()
    {
        return view('master.uom');
    }

    public function store(Request $request)
    {


        $validatedData = $request->validate([
            'uom_code' => 'required',
            'description' => 'required',
        ]);

        Uom::create([
            'uom_code' => $request->uom_code,
            'description' => $request->description
        ]);

        // Process the data (e.g., save it to the database)
        return response()->json(['success' => 'Form submitted successfully!']);
    }
}
