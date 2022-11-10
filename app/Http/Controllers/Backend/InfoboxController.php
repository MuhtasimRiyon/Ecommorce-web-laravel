<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infobox;
use Carbon\Carbon;

class InfoboxController extends Controller
{
    public function infoboxView(){
        $infobox = Infobox::latest()->get();
        return view ('backend.infobox.infobox_view',compact('infobox'));
    }

    public function infoboxStore(Request $request){

        $request->validate([
            'infobox_title' => 'required',
            'infobox_description' => 'required',
            'infobox_title_ban' => 'required',
            'infobox_description_ban' => 'required',
        ],[
            'infobox_title.required' => 'Info box title is required',
            'infobox_description.required' => 'Info box description is required',
            'infobox_title_ban.required' => 'Info box title bangla is required',
            'infobox_description_ban.required' => 'Info box description bangla is required',
        ]);

        Infobox::insert([
            'infobox_title' => $request->infobox_title,
            'infobox_description' => $request->infobox_description,
            'infobox_title_ban' => $request->infobox_title_ban,
            'infobox_description_ban' => $request->infobox_description_ban,
        ]);

        return redirect()->back();

    }

    public function infoboxDelete($id){

        Infobox::findOrFail($id)->delete();

        return redirect()->back();

    }

    public function infoboxEdit($id){
        $infobox = Infobox::findOrFail($id);
        return view ('backend.infobox.infobox_edit',compact('infobox'));
    }

    public function infoboxUpdate(Request $request){
        $slider_id = $request->id;;

        Infobox::findOrFail($slider_id)->update([
            'infobox_title' => $request->infobox_title,
            'infobox_description' => $request->infobox_description,
            'infobox_title_ban' => $request->infobox_title_ban,
            'infobox_description_ban' => $request->infobox_description_ban,
        ]);

        return redirect()->route('manage.infobox');
        
    }

    public function InActiveInfobox($id){
        Infobox::findOrFail($id)->update([
            'infobox_status' => 0
        ]);

        return redirect()->back();
    }

    public function ActiveInfobox($id){
        Infobox::findOrFail($id)->update([
            'infobox_status' => 1
        ]);

        return redirect()->back();
    }

}
