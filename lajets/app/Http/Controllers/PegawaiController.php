<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Pegawai;
use App\Http\Requests\PegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return Inertia::render('Pegawai/Index', [
            'pegawai' => Pegawai::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%');
            })->get()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelamin = array(
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',

        );
        return Inertia::render('Pegawai/Create', [
            'pegawai' => [],
            'kelamin' => $kelamin
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PegawaiRequest $request)
    {
        Pegawai::create($request->toArray());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil di update');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelamin = array(
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',

        );
        return Inertia::render('Pegawai/Create', [
            'pegawai' => Pegawai::findOrFail($id),
            'kelamin' => $kelamin
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PegawaiRequest $request, string $id)
    {
        Pegawai::where("id", $id)->update($request->toArray());
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dibuat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pegawai::where("id", $id)->delete();
        return redirect()->route('pegawai.index')->with('success', 'Pegawai berhasil dihapus');
    }
}
