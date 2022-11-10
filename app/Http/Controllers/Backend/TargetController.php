<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Business;
use App\Models\Target;

class TargetController extends Controller
{

    public function setTarget(){
        $business = Business::orderBy('business_name','ASC')->get();

        return view ('backend.target.target_view',compact('business'));
    }

    public function targetStore(Request $request){

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

            $data = new Target;

            $data->year = $request->year;
            $data->month = $request->month;
            $data->business_id = $value;
            $data->amount = $request->amount[$key];
            
            $data->save();
        }

        return redirect()->route('all.target');
        // return redirect()->back();

    }

    public function AlltargetView(Request $request){
        $business = DB::table('businesses')->get();
        // $target = Target::get();
        $amount=Target::sum('amount');

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
            
        $target = Target::where($where)->get();

        return view ('backend.target.All_target_View',compact('business','target','amount'));
    }

    public function targetDelete($id){

        Target::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function targetEdit($id){
        $business = Business::orderBy('business_name','ASC')->get();
        $target = Target::findOrFail($id);
        return view ('backend.target.targetEdit',compact('target','business'));
    }

    public function targetUpdate(Request $request){
        $target_id = $request->id;

        

            $data =  Target::find($request->id);

            $data->year = $request->year;
            $data->month = $request->month;
            $data->business_id = $request->business;
            $data->amount = $request->amount;
            
            $data->save();
        

        return redirect()->route('all.target');

    }

}
