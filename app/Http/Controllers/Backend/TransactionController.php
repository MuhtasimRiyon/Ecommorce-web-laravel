<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Business;

class TransactionController extends Controller
{
    public function newTransaction(){
        $business = Business::orderBy('business_name','ASC')->get();
        return view ('backend.transaction.transaction_view',compact('business'));
    }

    public function transactionStore(Request $request){
        $request->validate([
            'date' => 'required',
            'business' => 'required',
            'trx_type' => 'required',
            'amount' => 'required',
            'trx_by' => 'required',
        ],[
            'business.required' => 'business name is required',
            'trx_type.required' => 'trx type is required',
            'date.required' => 'Date is required',
            'amount.required' => 'amount is required',
            'trx_by.required' => 'trx by is required',
        ]);

        $target = new Transaction;

            $target->date = $request->date;
            $target->business = $request->business;
            $target->trx_type = $request->trx_type;
            $target->amount = $request->amount;
            $target->trx_by = $request->trx_by;
            if($request->trx_type == 1){
                $target->cash_received_amount = $request->amount;
            }else{
                $target->product_purchase_amount = $request->amount;
            }

        if($target->save()){
            return redirect()->route('all.transaction');
        }else{
            return redirect()->route('new.transaction');
        }

    }

    public function AllTransactionView(){
        $cash_received_amount=Transaction::sum('cash_received_amount');
        $product_purchase_amount=Transaction::sum('product_purchase_amount');
        $totalAmount=Transaction::sum('amount');
        $transaction = Transaction::latest()->get();
        return view ('backend.transaction.all_transaction_view',compact('transaction','cash_received_amount','product_purchase_amount','totalAmount'));
    }

    public function transactionEdit($id){
        $business = Business::orderBy('business_name','ASC')->get();
        $transaction = Transaction::findOrFail($id);
        return view ('backend.transaction.transaction_Edit',compact('transaction','business'));
    }

    public function TransactionUpdate(Request $request){
        $transaction_id = $request->id;

        Transaction::findOrFail($transaction_id)->update([
            'date' => $request->date,
            'business' => $request->business,
            'trx_type' => $request->trx_type,
            'amount' => $request->amount,
            'trx_by' => $request->trx_by,
        ]);

        return redirect()->route('all.transaction');

    }

    public function transactionDelete($id){

        Transaction::findOrFail($id)->delete();

        return redirect()->back();

    }

}
