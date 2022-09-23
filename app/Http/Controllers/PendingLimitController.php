<?php

namespace App\Http\Controllers;

use App\PendingLimit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Stock;

class PendingLimitController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $arr['stock'] = Stock::all();
        return view('admin.lowlimit.index', ['arr' => $arr]);
    }

}
