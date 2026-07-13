<?php

namespace App\Http\Controllers;

use App\Models\PenyaluranBantuan;
use App\Models\PenerimaBantuan;
use App\Models\ProgramDonasi;
use App\Http\Requests\StorePenyaluranRequest;
use App\Http\Requests\UpdatePenyaluranRequest;

class PenyaluranController extends Controller
{
    public function index()
    {
        $distributions = PenyaluranBantuan::with(['penerima', 'program'])->get();
        return view('distributions.index', compact('distributions'));
    }

    public function create()
    {
        $recipients = PenerimaBantuan::all();
        $programs = ProgramDonasi::all();
        return view('distributions.create', compact('recipients', 'programs'));
    }

    public function store(StorePenyaluranRequest $request)
    {
        PenyaluranBantuan::create($request->validated());
        return redirect()->route('distributions.index')->with('success', 'Penyaluran bantuan dicatat.');
    }

    public function show(PenyaluranBantuan $distribution)
    {
        return view('distributions.show', compact('distribution'));
    }

    public function edit(PenyaluranBantuan $distribution)
    {
        $recipients = PenerimaBantuan::all();
        $programs = ProgramDonasi::all();
        return view('distributions.edit', compact('distribution', 'recipients', 'programs'));
    }

    public function update(UpdatePenyaluranRequest $request, PenyaluranBantuan $distribution)
    {
        $distribution->update($request->validated());
        return redirect()->route('distributions.index')->with('success', 'Penyaluran diperbarui.');
    }

    public function destroy(PenyaluranBantuan $distribution)
    {
        $distribution->delete();
        return redirect()->route('distributions.index')->with('success', 'Penyaluran dihapus.');
    }
}