<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\marketer;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function newVisit(){
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        $upazilas  = DB::table('upazilas')->get();
        // $data    = DB::table('unions')->get();
        
        $marketer = marketer::orderBy('marketer_name','ASC')->get();
        return view ('backend.visit.visit_view',compact('marketer','divisions','districts','upazilas'));
    }

     /**
     * get district list
     */
    public function districtList(Request $request) {
        $option = '<option value="" selected> Select Districts </option>';
        if (!empty($request->id)) {
            $results = DB::table('districts')->where('division_id', $request->id)->get();
            if (!empty($results)) {
                foreach ($results as $row) {
                    if (!empty($request->select_id) && $request->select_id == $row->id) {
                        $option .= '<option value="' . $row->id . '" selected>' . $row->name . '</option>';
                    } else {
                        $option .= '<option value="' . $row->id . '">' . $row->name . '</option>';
                    }
                }
            }
        }
        echo $option;
    }

    /**
     * get Upazila list
     */
    public function upazilaList(Request $request) {
        $option = '<option value="" selected>উপজেলা নির্বাচন করুন</option>';
        if (!empty($request->id)) {
            $results = DB::table('upazilas')->where('district_id', $request->id)->get();
            if (!empty($results)) {
                foreach ($results as $row) {
                    if (!empty($request->select_id) && $request->select_id == $row->id) {
                        $option .= '<option value="' . $row->id . '" selected>' . $row->bn_name . '</option>';
                    } else {
                        $option .= '<option value="' . $row->id . '">' . $row->bn_name . '</option>';
                    }
                }
            }
        }
        echo $option;
    }

    /**
     * get Union list
     */
    public function unionList(Request $request) {
        $option = '<option value="" selected>ইউনিয়ন নির্বাচন করুন</option>';
        if (!empty($request->id)) {
            $results = DB::table('unions')->where('upazilla_id', $request->id)->get();
            if (!empty($results)) {
                foreach ($results as $row) {
                    if (!empty($request->select_id) && $request->select_id == $row->id) {
                        $option .= '<option value="' . $row->id . '" selected>' . $row->bn_name . '</option>';
                    } else {
                        $option .= '<option value="' . $row->id . '">' . $row->bn_name . '</option>';
                    }
                }
            }
        }
        echo $option;
    }

    public function VisitStore(Request $request){
        $request->validate([
            'date' => 'required',
            'shop_name' => 'required',
            'proprietor_name' => 'required',
            'mobile_1' => 'required',
            // 'mobile_2' => 'required',
            'Email' => 'required',
            'zila' => 'required',
            'upzila' => 'required',
            'marketer' => 'required',
            // 'address' => 'required',
            // 'remark' => 'required',
            'interested' => 'required',
        ],[
            'date.required' => 'Date is required',
            'shop_name.required' => 'Shop name is required',
            'proprietor_name.required' => 'Proprietor name is required',
            'mobile_1.required' => 'mobile is required',
            'Email.required' => 'Email is required',
            'zila.required' => 'zila is required',
            'upzila.required' => 'upzila is required',
            'marketer.required' => 'marketer is required',
            'interested.required' => 'interested is required',
        ]);

        $target = new Visit;

            $target->date = $request->date;
            $target->shop_name = $request->shop_name;
            $target->proprietor_name = $request->proprietor_name;
            $target->mobile_1 = $request->mobile_1;
            $target->mobile_2 = $request->mobile_2;
            $target->Email = $request->Email;
            $target->zila = $request->zila;
            $target->upzila = $request->upzila;
            $target->marketer = $request->marketer;
            $target->address = $request->address;
            $target->remark = $request->remark;
            $target->interested = $request->interested;
            

        if($target->save()){
             return redirect()->route('all.visit');
            // return redirect()->back();
        }else{
            return redirect()->route('new.visit');
        }

    }

    public function AllVisitView(Request $request){
        $districts = DB::table('districts')->get();
        $upazilas  = DB::table('upazilas')->get();
        $visitMarketers = DB::table('marketers')->get();
        // $visit = Visit::latest()->get();
        $marketer = marketer::orderBy('marketer_name','ASC')->get();

        $where = [];
        if (!empty($request->_token)) {
            
            if (!empty($request->start_date)) {
                $where[] = ['date', '>=', $request->start_date];
            }
            if (!empty($request->end_date)) {
                $where[] = ['date', '<=', $request->end_date];
            }
            if (!empty($request->zila)) {
                    $where[] = ['zila', $request->zila];
            }
            if (!empty($request->upzila)) {
                $where[] = ['upzila', $request->upzila];
            }
            if (!empty($request->marketer)) {
                $where[] = ['marketer', $request->marketer];
            }
            if (!empty($request->interested)) {
                $where[] = ['interested', $request->interested];
            }
                
            }
            
           
            $visit = Visit::where($where)->get();


        return view ('backend.visit.all_visit_view',compact('visit','districts','upazilas','visitMarketers','marketer'));
    }

    public function VisitDelete($id){

        Visit::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function VisitEdit($id){
        $divisions = DB::table('divisions')->get();
        $districts = DB::table('districts')->get();
        $upazilas  = DB::table('upazilas')->get();
        
        $marketer = marketer::orderBy('marketer_name','ASC')->get();
        $visit = Visit::findOrFail($id);

        return view ('backend.visit.visit_Edit',compact('marketer','divisions','districts','upazilas','visit'));
    }

    public function VisitUpdate(Request $request){
        $visit_id = $request->id;

        Visit::findOrFail($visit_id)->update([
            'date' => $request->date,
            'shop_name' => $request->shop_name,
            'proprietor_name' => $request->proprietor_name,
            'mobile_1' => $request->mobile_1,
            'mobile_2' => $request->mobile_2,
            'Email' => $request->Email,
            'zila' => $request->zila,
            'upzila' => $request->upzila,
            'marketer' => $request->marketer,
            'address' => $request->address,
            'remark' => $request->remark,
            'interested' => $request->interested,
        ]);

        return redirect()->route('all.visit');

    }

}


