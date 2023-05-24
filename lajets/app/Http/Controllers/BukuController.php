<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\BukuModel;
use App\Http\Requests\BukuRequest;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Buku/Index', [
            'books' => BukuModel::when($request->term, function ($query, $term) {
                $query->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('description', 'LIKE', '%' . $term . '%');
            })->get()->toArray()
        ]);
    }
    
    public function create()
    {
        return Inertia::render('Buku/Create', [
            'books' => []
        ]);
    }

    public function edit(String $id)
    {
        return Inertia::render('Buku/Create', [
            'books' => BukuModel::findOrFail($id)
        ]);
    }

    public function update(String $id, BukuRequest $request)
    {   
        BukuModel::where("id", $id)->update($request->toArray());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dibuat');
    }
    
    public function store(BukuRequest $request)
    {   
        BukuModel::create($request->toArray());
        return redirect()->route('buku.index')->with('success', 'Buku berhasil di update');
    }

    public function destroy(String $id)
    {   
        BukuModel::where("id", $id)->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
