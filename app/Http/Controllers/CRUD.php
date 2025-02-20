<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUD extends Controller
{
    public function retrieve()
    {
        $inventory = DB::select("SELECT * FROM inventory");
        return view('manage', ["inventory" => $inventory, "title" => "Manage", "showForm" => false]);
    }
    public function delete($id)
    {
        DB::delete("DELETE FROM inventory WHERE code = ?", [$id]);
        return redirect('/manage')->with('success', 'Item deleted successfully.');
    }
    public function insert(Request $request)
    {
        DB::insert("INSERT INTO inventory VALUES(NULL, :name, :description, :price)", [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return redirect("/manage")->with('success', 'Item added successfully.');
    }

    public function showCreateForm()
    {
        $inventory = DB::select("SELECT * FROM inventory");
        return view('manage', ["inventory" => $inventory, "showForm" => true, "title" => "Manage"]);
    }

    public function showEditForm($id)
    {
        $inventory = DB::select("SELECT * FROM inventory WHERE code = ?", [$id]);
        return view('manage', ["inventory" => $inventory, "showForm" => true, "title" => "Manage"]);
    }
}
