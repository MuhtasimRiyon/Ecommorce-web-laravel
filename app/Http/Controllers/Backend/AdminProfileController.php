<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function adminProfileEdit(){
        $editData = Admin::find(1);
        return view('admin.admin_profile_edit',compact('editData'));
    }

    public function adminProfileStore(Request $request){
        $data = Admin::find($request->id);
        $data->name = $request->name;
        $data->email = $request->email;

        
        if($request->file('profile_photo_path')){

            if(file_exists($request->old_path)) unlink($request->old_path);

            $path = 'public/upload/admin_images';
            $photo = $request->file('profile_photo_path');
            $extension = $photo->getClientOriginalExtension();
            $filename = floor(microtime(true)) . '.' . $extension;
            if (!is_dir($path)) mkdir($path, 0700, true);
            $photo->move($path, $filename);

            $data['profile_photo_path'] = $path . '/' . $filename;
        }
        
        $data->save();

        $notification = array(
            'message' => 'Admin profile updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function adminChangePassword(){
        return view('admin.admin_change_password');
    }

    public function adminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Admin::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        }else{
            return redirect()->back();
        }
    }

}


       