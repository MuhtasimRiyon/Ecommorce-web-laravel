<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function CategoryView(){
        $category = Category::latest()->get();
        return view ('backend.category.category_view',compact('category'));
    }

    public function CategoryStore(Request $request){
        
        $request->validate([
            'category_name_en' => 'required',
            'category_name_ban' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'English category name is required',
            'category_name_ban.required' => 'Bangla category name is required',
            'category_icon.required' => 'Icon is required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_ban' => $request->category_name_ban,
            'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_ban' => str_replace('','-',$request->category_name_ban),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->back();

    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view ('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request){
        
        $cat_id = $request->id;

        Category::findOrFail($cat_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_ban' => $request->category_name_ban,
            'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_ban' => str_replace('','-',$request->category_name_ban),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->route('all.category');
        
    }

    public function CategoryDelete($id){

        Category::findOrFail($id)->delete();

        return redirect()->back();

    }

}
