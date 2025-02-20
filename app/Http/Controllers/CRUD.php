<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUD extends Controller
{
    public function retrieve()
    {
        $inventory = DB::select("SELECT * FROM inventory");
        return view('manage', ["inventory" => $inventory, "title" => "Manage"]);
    }
    public function delete($id)
    {

        DB::delete("DELETE FROM inventory WHERE code = ?", [$id]);
        return redirect('/manage')->with('success', 'Item deleted successfully.');
    }
}
