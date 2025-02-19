<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUD extends Controller
{
    public function retrieve()
    {
        $inventory = DB::select("SELECT * FROM inventory");
        return view('app', ["inventory" => $inventory]);
    }
}
