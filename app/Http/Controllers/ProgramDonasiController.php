<?php

namespace App\Http\Controllers;

use App\Models\ProgramDonasi;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

class ProgramDonasiController extends Controller
{
    public function index()
    {
        $programs = ProgramDonasi::withCount('donasis')->get();
        return view('programs.index', compact('programs'));
    }

    public function create()
    {
        return view('programs.create');
    }

    public function store(StoreProgramRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('programs', 'public');
        }
        ProgramDonasi::create($data);
        return redirect()->route('programs.index')->with('success', 'Program donasi berhasil dibuat.');
    }

    public function show(ProgramDonasi $program)
    {
        return view('programs.show', compact('program'));
    }

    public function edit(ProgramDonasi $program)
    {
        return view('programs.edit', compact('program'));
    }

    public function update(UpdateProgramRequest $request, ProgramDonasi $program)
    {
        $data = $request->validated();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('programs', 'public');
        }
        $program->update($data);
        return redirect()->route('programs.index')->with('success', 'Program donasi diperbarui.');
    }

    public function destroy(ProgramDonasi $program)
    {
        $program->delete();
        return redirect()->route('programs.index')->with('success', 'Program donasi dihapus.');
    }
}