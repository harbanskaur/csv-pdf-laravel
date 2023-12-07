<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowController extends Controller
{
    //returns main login page 
    public function index()
    {
        return view('login');
    }
    
    //returns upload image csv page 
    public function image()
    {
        return view('ImageUpload');
    }

    //returns page with download csv
    public function Download()
    {
        return view('Download');
    }

    //returns chnage password 
    public function ChangePass()
    {
        return view('ChangePass');
    }
}
