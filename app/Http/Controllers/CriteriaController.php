<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $this->authorize('view', Criteria::class);

        $criterias = Criteria::all();

        return view('criterias.index', compact('criterias'));
    }

    public function create()
    {
        $this->authorize('create', Criteria::class);

        return view('criterias.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'weight' => 'required'
        ]);

        Criteria::create($validatedData);

        return redirect('criterias')->with('success', 'Kriteria berhasil ditambahkan');
    }

    public function edit(Criteria $criteria)
    {
        $this->authorize('update', $criteria);

        return view('criterias.edit', compact('criteria'));
    }

    public function update(Request $request, Criteria $criteria)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'weight' => 'required'
        ]);

        $criteria->update($validatedData);

        return redirect('criterias')->with('success', 'Kriteria berhasil diubah');
    }

    public function destroy(Criteria $criteria)
    {
        $this->authorize('delete', $criteria);

        $criteria->delete();

        return redirect('criterias')->with('success', 'Kriteria berhasil dihapus');
    }
}
