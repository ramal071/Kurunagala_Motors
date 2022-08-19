<?php

namespace App\Http\Controllers;

use App\limit;
use Illuminate\Http\Request;
use App\Stock;
use App\Product;
use Illuminate\Support\Facades\DB;

class limitController extends Controller
{
   
    public function index()
    {   
        return view('admin.limit.index');
    }

}
