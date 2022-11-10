<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\marketer;

class MarketerController extends Controller
{
    public function MarketerView(){
        return view ('backend.marketer.marketer_view');
    }

    public function MarketerStore(Request $request){
        $request->validate([
            'marketer_name' => 'required',
            'mobile' => 'required',
        ],[
            'marketer_name.required' => 'Marketer name is required',
            'mobile.required' => 'Mobile is required',
        ]);

        marketer::insert([
            'marketer_name' => $request->marketer_name,
            'mobile' => $request->mobile,
        ]);

        return redirect()->route('all.marketer');

    }

    public function AllMarketerView(){
        $marketer = marketer::latest()->get();
        return view ('backend.marketer.all_marketer_view',compact('marketer'));
    }

    public function MarketerEdit($id){
        $marketer = marketer::findOrFail($id);
        return view ('backend.marketer.marketer_edit',compact('marketer'));
    }

    public function MarketerUpdate(Request $request){
        $marketer_id = $request->id;

        marketer::findOrFail($marketer_id)->update([
            'marketer_name' => $request->marketer_name,
            'mobile' => $request->mobile,
        ]);

        return redirect()->route('all.marketer');

    }

    public function MarketerDelete($id){

        marketer::findOrFail($id)->delete();

        return redirect()->back();

    }

}
