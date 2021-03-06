<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Sale;
use App\SaleDrug;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;

class SaleController extends Controller
{
    public function create() {

        $drugs = Drug::where('balance', '>', 0)->get();

        return view('sale_order', [
            'drugs' => $drugs
        ]);
    }

    public function store(Request $request) {
        $saleDate = Carbon::now()->format('Y-m-d');

        $sale = new Sale();
        $sale->created_at = $saleDate;
        $sale->timestamps = false;
        $sale->save();
        $saleId = $sale->id;


        foreach ($request->input('drug_id') as $index => $drugId) {
           $amount = $request->input('amount')[$index];
           $saleDrug = new SaleDrug();
            $saleDrug->sale_id = $saleId;
            $saleDrug->drug_id = $drugId;
            $saleDrug->amount = $amount;
            $saleDrug->timestamps = false;
            $drug = Drug::find($drugId);
           if($amount <=$drug->balance)
           {  
            $saleDrug->save();
            $newBalance = $drug->balance - $amount;
            $drug->balance = $newBalance;
            $drug->timestamps = false;
            $drug->save();
        }
        else
        {
         $saleDrug->amount = $drug->balance;

           $saleDrug->save();
            $drug->balance = 0;
            $drug->timestamps = false;
            $drug->save();
            
        }
        }

        return redirect('/');
    }
}
