<?php

namespace App\Http\Controllers;

use App\Models\Buruh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuruhController extends Controller
{

    public function index()
    {
        if (Auth::user()->role != 'administrator') {
            return redirect()->route('income_transactions.create')->with(['error' => 'you are not administrator :(']);
        }
        return view('worker.worker');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'nik' => 'required|max:16',
            'place' => 'required'
        ]);

        Buruh::create([
            'name' => $request->name,
            'nik' => $request->nik,
            'place' => $request->place
        ]);

        return redirect()->route('worker.index')->with(['success' => 'Buruh successfully added']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
