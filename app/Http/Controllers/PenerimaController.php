<?php

namespace App\Http\Controllers;

use App\Models\PenerimaBantuan;
use App\Http\Requests\StorePenerimaRequest;
use App\Http\Requests\UpdatePenerimaRequest;

class PenerimaController extends Controller
{
    public function index()
    {
        $recipients = PenerimaBantuan::withCount('penyalurans')->get();
        return view('recipients.index', compact('recipients'));
    }

    public function create()
    {
        return view('recipients.create');
    }

    public function store(StorePenerimaRequest $request)
    {
        PenerimaBantuan::create($request->validated());
        return redirect()->route('recipients.index')->with('success', 'Penerima bantuan ditambahkan.');
    }

    public function show(PenerimaBantuan $recipient)
    {
        return view('recipients.show', compact('recipient'));
    }

    public function edit(PenerimaBantuan $recipient)
    {
        return view('recipients.edit', compact('recipient'));
    }

    public function update(UpdatePenerimaRequest $request, PenerimaBantuan $recipient)
    {
        $recipient->update($request->validated());
        return redirect()->route('recipients.index')->with('success', 'Data penerima diperbarui.');
    }

    public function destroy(PenerimaBantuan $recipient)
    {
        $recipient->delete();
        return redirect()->route('recipients.index')->with('success', 'Penerima bantuan dihapus.');
    }
}