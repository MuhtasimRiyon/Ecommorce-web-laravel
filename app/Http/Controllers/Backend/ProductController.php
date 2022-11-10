<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('backend.product.product_add',compact('category','brand'));
    }

    public function StoreProduct(Request $request){

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        $product_id = Product::insertGetId([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ban' => $request->product_name_ban,
            'product_slug_en' => strtolower(str_replace('','-',$request->product_name_en)),
            'product_slug_ban' => str_replace('','-',$request->product_name_ban),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ban' => $request->product_tags_ban,
            'product_size_en' => $request->product_size_en,
            'product_size_ban' => $request->product_size_ban,
            'product_color_en' => $request->product_color_en,
            'product_color_ban' => $request->product_color_ban,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ban' => $request->short_descp_ban,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ban' => $request->long_descp_ban,
            'product_thambnail' => $save_url,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        //////////////// multi img store /////////////

        $images = $request->file('multi_img');
        foreach($images as $img){
            $mulimg_name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/products/multi-img/'.$mulimg_name_gen);
            $mulimg_save_url = 'upload/products/multi-img/'.$mulimg_name_gen;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $mulimg_save_url,
                'created_at' => Carbon::now(),
            ]);

        }

        return redirect()->route('manage.product');

    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function EditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();
        $brand = Brand::latest()->get();
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        return view('backend.product.product_edit',compact('brand','category','subcategory','subsubcategory','product','multiImgs'));
    }

    public function UpdateProductData(Request $request){
        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_ban' => $request->product_name_ban,
            'product_slug_en' => strtolower(str_replace('','-',$request->product_name_en)),
            'product_slug_ban' => str_replace('','-',$request->product_name_ban),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_ban' => $request->product_tags_ban,
            'product_size_en' => $request->product_size_en,
            'product_size_ban' => $request->product_size_ban,
            'product_color_en' => $request->product_color_en,
            'product_color_ban' => $request->product_color_ban,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_ban' => $request->short_descp_ban,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_ban' => $request->long_descp_ban,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('manage.product');

    }

    public function UpdateProductMulImg(Request $request){
        $imgs = $request->multi_img;

        foreach($imgs as $id => $value){

            $imgDlt = MultiImg::findOrFail($id);
            unlink($imgDlt->photo_name);
            
            $name_gen_mulimg = hexdec(uniqid()).'.'.$value->getClientOriginalExtension();
            Image::make($value)->resize(917,1000)->save('upload/products/multi-img/'.$name_gen_mulimg);
            $save_url_mulimg = 'upload/products/multi-img/'.$name_gen_mulimg;

            MultiImg::where('id',$id)->update([
                'photo_name' => $save_url_mulimg,
                'updated_at' => Carbon::now(),
            ]);

        }

        return redirect()->back();

    }

    public function UpdateProductImg(Request $request){
        $pro_id = $request->id;
        $oldImg = $request->old_img;
        unlink($oldImg);

        $image = $request->file('product_thambnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/products/thambnail/'.$name_gen);
        $save_url = 'upload/products/thambnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->back();

    }

    public function MultiImgDlt($id){
        $oldimg = MultiImg::findOrFail($id);
        unlink($oldimg->photo_name);

        MultiImg::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function InActiveProduct($id){
        Product::findOrFail($id)->update([
            'status' => 0
        ]);

        return redirect()->back();
    }

    public function ActiveProduct($id){
        Product::findOrFail($id)->update([
            'status' => 1
        ]);

        return redirect()->back();
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thambnail);
        Product::findOrFail($id)->delete();

        $imgs = MultiImg::where('product_id',$id)->get();
        foreach($imgs as $value){
            unlink($value->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        return redirect()->back();
    }

}
