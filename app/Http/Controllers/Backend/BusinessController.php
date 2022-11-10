<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business;

class BusinessController extends Controller
{
    public function BusinessView(){
        return view ('backend.business.businessView');
    }

    public function businessStore(Request $request){
        $request->validate([
            'business_name' => 'required',
        ],[
            'business_name.required' => 'Business name is required',
        ]);

        Business::insert([
            'business_name' => $request->business_name,
        ]);

        return redirect()->route('all.business');

    }

    public function AllBusinessView(){
        $business = Business::latest()->get();
        return view ('backend.business.AllbusinessView',compact('business'));
    }

    public function businessEdit($id){
        $business = Business::findOrFail($id);
        return view ('backend.business.businessEdit',compact('business'));
    }

    public function BusinessUpdate(Request $request){
        $business_id = $request->id;

        Business::findOrFail($business_id)->update([
            'business_name' => $request->business_name,
        ]);

        return redirect()->route('all.business');

    }

    public function businessDelete($id){

        Business::findOrFail($id)->delete();

        return redirect()->back();

    }

}
