<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\ProgramDonasi;
use App\Http\Requests\StoreDonasiRequest;
use App\Http\Requests\UpdateDonasiRequest;

class DonasiController extends Controller
{
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $donasis = Donasi::with(['user', 'program'])->get();
        } else {
            $donasis = Donasi::where('user_id', auth()->id())->with('program')->get();
        }
        return view('donations.index', compact('donasis'));
    }

    public function create()
    {
        $programs = ProgramDonasi::all();
        return view('donations.create', compact('programs'));
    }

    public function store(StoreDonasiRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['status'] = 'pending';
        if ($request->hasFile('bukti_transfer')) {
            $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti', 'public');
        }
        Donasi::create($data);
        return redirect()->route('donations.index')->with('success', 'Donasi berhasil direkam, menunggu verifikasi.');
    }

    public function show(Donasi $donation)
    {
        if (!auth()->user()->isAdmin() && auth()->id() !== $donation->user_id) {
            abort(403);
        }
        return view('donations.show', compact('donation'));
    }

    public function edit(Donasi $donation)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        $programs = ProgramDonasi::all();
        return view('donations.edit', compact('donation', 'programs'));
    }

    public function update(UpdateDonasiRequest $request, Donasi $donation)
    {
        $data = $request->validated();
        if ($request->hasFile('bukti_transfer')) {
            $data['bukti_transfer'] = $request->file('bukti_transfer')->store('bukti', 'public');
        }
        $donation->update($data);
        return redirect()->route('donations.index')->with('success', 'Donasi diperbarui.');
    }

    public function destroy(Donasi $donation)
    {
        if (!auth()->user()->isAdmin() && auth()->id() !== $donation->user_id) {
            abort(403);
        }
        $donation->delete();
        return redirect()->route('donations.index')->with('success', 'Donasi dihapus.');
    }
}