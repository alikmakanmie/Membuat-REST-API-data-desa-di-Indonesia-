<?php

namespace App\Http\Controllers\data;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravolt\Indonesia\Models\Village;

class VillagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Village::all();
        return response()->json([
            'status' => 'sukses',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.   
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'code' => 'required|max:10|unique:indonesia_villages,code',
            'district_code' => 'required|max:7|exists:indonesia_districts,code',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'pesan' => $validator->errors()
            ], 400);
        }

        $data = Village::create($request->all());
        return response()->json([
            'status' => 'Berhasil dibuat',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Village::findOrFail($id);
        return response()->json([
            'status' => 'Berhasil diambil',
            'data' => $data
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Village::findOrFail($id);
        $data->update($request->all());
        return response()->json([
            'status' => 'Berhasil diperbarui',
            'data' => $data
        ], 200);
    }

    /**
     * Menghapus sumber daya yang ditentukan dari penyimpanan.
     */
    public function destroy(string $id)
    {
        $data = Village::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'Berhasil dihapus',
            'data' => $data
        ], 200);
    }
}