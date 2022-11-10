<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view ('backend.category.sub_category_view',compact('subcategory','category'));
    }

    public function SubCategoryStore(Request $request){
        
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_ban' => 'required',
        ],[
            'subcategory_name_en.required' => 'English Subcategory name is required',
            'subcategory_name_ban.required' => 'Bangla Subcategory name is required',
            'category_id.required' => 'Please select Category',
        ]);

        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_slug_en' => strtolower(str_replace('','-',$request->subcategory_name_en)),
            'subcategory_slug_ban' => str_replace('','-',$request->subcategory_name_ban),
        ]);

        return redirect()->back();

    }

    public function SubCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view ('backend.category.sub_category_edit',compact('subcategory','category'));
    }

    public function SubCategoryUpdate(Request $request){
        
        $subcat_id = $request->id;

        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_ban' => $request->subcategory_name_ban,
            'subcategory_slug_en' => strtolower(str_replace('','-',$request->subcategory_name_en)),
            'subcategory_slug_ban' => str_replace('','-',$request->subcategory_name_ban),
        ]);

        return redirect()->route('all.SubCategory');
        
    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();

        return redirect()->back();

    }

    // ########### Sub-Sub category starts ##########

    public function SubSubCategoryView(){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::latest()->get();
        return view ('backend.category.sub_sub_category_view',compact('subsubcategory','category'));
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcat);
    }

    public function SubSubCategoryStore(Request $request){
        
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_ban' => 'required',
        ],[
            'category_id.required' => 'Please select Category',
            'subcategory_id.required' => 'Please select Sub Category',
            'subsubcategory_name_en.required' => 'English Sub->Subcategory name is required',
            'subsubcategory_name_ban.required' => 'Bangla Sub->Subcategory name is required',
        ]);

        SubSubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ban' => $request->subsubcategory_name_ban,
            'subsubcategory_slug_en' => strtolower(str_replace('','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_ban' => str_replace('','-',$request->subsubcategory_name_ban),
        ]);

        return redirect()->back();

    }

    public function SubSubCategoryEdit($id){
        $category = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_en','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view ('backend.category.sub_sub_category_edit',compact('subsubcategory','subcategory','category'));
    }

    public function SubSubCategoryUpdate(Request $request){
        
        $subsubcat_id = $request->id;

        SubSubCategory::findOrFail($subsubcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_ban' => $request->subsubcategory_name_ban,
            'subsubcategory_slug_en' => strtolower(str_replace('','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_ban' => str_replace('','-',$request->subsubcategory_name_ban),
        ]);

        return redirect()->route('all.SubSubCategory');
        
    }

    public function subsubCategoryDelete($id){

        SubSubCategory::findOrFail($id)->delete();

        return redirect()->back();

    }

}
