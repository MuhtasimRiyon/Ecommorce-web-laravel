<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function English(){
        Session::get('Language');
        Session::forget('Language');
        Session::put('Language','english');
        return redirect()->back();
    }

    public function Bangla(){
        Session::get('Language');
        Session::forget('Language');
        Session::put('Language','bangla');
        return redirect()->back();
    }

}
