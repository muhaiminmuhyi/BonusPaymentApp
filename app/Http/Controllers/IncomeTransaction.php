<?php

namespace App\Http\Controllers;

use App\Models\Buruh;
use App\Models\Fee;
use App\Models\IncomeTransaction as ModelsIncomeTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Util\Percentage;

class IncomeTransaction extends Controller
{
    public function index()
    {
        $data = DB::table('income_transactions')
                ->join('buruhs', 'income_transactions.id_buruh', '=', 'buruhs.id')
                ->join('fees', 'income_transactions.id_fee', '=', 'fees.id')
                ->select('income_transactions.*', 'buruhs.name','fees.nominal')
                ->get();

        return view('income_transactions.income_transaction', compact('data'));
    }

    public function create()
    {
        $data = Buruh::latest()->get();
        return view('income_transactions.create', compact('data'));
    }

    public function store(Request $request)
    {
        $sum = array_sum($request->percentage);
        if ($sum != 100) {
            return redirect()->route('income_transactions.create')->with(['error' => 'Percentage under 100%']);
        }

        $this->validate($request, [
            'percentage' => 'required',
            'nominal' => 'required'
        ]);

        $feeId = Fee::create([
            'nominal' => $request->nominal,
            'payment_date' => date('Y-m-d')
        ])->id;

        $length = count($request->id);
        for ($i=0; $i < $length; $i++) { 
            $data[] = ['id' => $request->id[$i], 'percentage' => $request->percentage[$i]];
        }

        foreach ($data as $d) {
            ModelsIncomeTransaction::create([
               'id_buruh' => $d['id'],
               'id_fee' => $feeId,
               'percentage' => $d['percentage'],
               'bonus_amount' => ($request->nominal*$d['percentage'])/100, 
            ]);
        }
        
        return redirect()->route('income_transactions.index')->with(['success' => 'Transaction successfully']);
    }

    public function show(string $id)
    {
        $data = DB::table('income_transactions')
                ->join('buruhs', 'income_transactions.id_buruh', '=', 'buruhs.id')
                ->join('fees', 'income_transactions.id_fee', '=', 'fees.id')
                ->where('income_transactions.id', $id)
                ->select('income_transactions.*', 'buruhs.name','fees.nominal')
                ->get();

        return view('income_transactions.show', compact('data'));
    }

    public function edit(string $id)
    {
        $data = DB::table('income_transactions')
                ->join('buruhs', 'income_transactions.id_buruh', '=', 'buruhs.id')
                ->join('fees', 'income_transactions.id_fee', '=', 'fees.id')
                ->where('income_transactions.id', $id)
                ->select('income_transactions.*', 'buruhs.name','fees.nominal')
                ->get();

        return view('income_transactions.edit', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'percentage' => 'required',
        ]);

        DB::table('income_transactions')->where('id', $id)->update([
            'percentage' => $request->percentage,
            'bonus_amount' => ($request->nominal*$request->percentage)/100
        ]);

        return redirect()->route('income_transactions.index')->with(['success' => 'Transaction successfully update!!']);
    }

    public function destroy(string $id)
    {
        DB::table('income_transactions')->where('id', $id)->delete();
        return redirect()->route('income_transactions.index')->with(['success' => 'Transaction successfully deleted!!']);
    }
}
