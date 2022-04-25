<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminHomcontroller extends Controller
{
    public function index(){
       return view('admin.admin');
    }
    
}
