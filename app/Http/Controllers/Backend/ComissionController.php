<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use App\Models\Comission;

class ComissionController extends Controller
{
    public function newComission(){
        $business = Business::orderBy('business_name','ASC')->get();

        return view ('backend.comission.comission_view',compact('business'));
    }

    public function comissionStore(Request $request){

        $request->validate([
            'year' => 'required',
            'month' => 'required',
            'amount' => 'required',
        ],[
            'year.required' => 'year name is required',
            'month.required' => 'month name is required',
            'amount.required' => 'amount name is required',
        ]);

        

        foreach($request->business_id as $key => $value){

            $data = new Comission;

            $data->year = $request->year;
            $data->month = $request->month;
            $data->business_id = $value;
            $data->amount = $request->amount[$key];
            
            $data->save();
        }

        return redirect()->route('all.comission');
        // return redirect()->back();

    }

    public function AllcomissionView(Request $request){
        $business = DB::table('businesses')->get();
        // $commission = Comission::get();
        $amount=Comission::sum('amount');

        $where = [];
            if (!empty($request->_token)) {
                
                if (!empty($request->year)) {
                    $where[] = ['year', $request->year];
                }
                if (!empty($request->month)) {
                    $where[] = ['month', $request->month];
                }
                if (!empty($request->business)) {
                    $where[] = ['business_id', $request->business];
                }
                    
            }
            
           
            $commission = Comission::where($where)->get();

        return view ('backend.comission.All_comission_View',compact('business','commission','amount'));
    }

    public function comissionDelete($id){

        Comission::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function comissionEdit($id){
        $business = Business::orderBy('business_name','ASC')->get();
        $commission = Comission::findOrFail($id);
        return view ('backend.comission.comissionEdit',compact('commission','business'));
    }

    public function comissionUpdate(Request $request){
        $target_id = $request->id;

        

            $data =  Comission::find($request->id);

            $data->year = $request->year;
            $data->month = $request->month;
            $data->business_id = $request->business;
            $data->amount = $request->amount;
            
            $data->save();
        

        return redirect()->route('all.comission');

    }

}
