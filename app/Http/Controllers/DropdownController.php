<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class DropdownController extends Controller
{
    function index(){
        $list=DB::table('provinces')->get();
        return view('place')->with('list',$list);
    }
}
