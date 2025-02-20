<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CRUD extends Controller
{
    public function retrieve()
    {
        $inventory = DB::select("SELECT * FROM inventory");
        return view('manage', ["inventory" => $inventory, "title" => "Manage", "showCreateForm" => false, "showEditForm" => false]);
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
        return view('manage', ["inventory" => $inventory, "showCreateForm" => true, "title" => "Manage", "showEditForm" => false]);
    }

    public function showEditForm($id)
    {
        $editingItem = DB::selectOne("SELECT * FROM inventory WHERE code = ?", [$id]);
        $inventory = DB::select("SELECT * FROM inventory");
        return view('manage', [
            "inventory" => $inventory,
            "showEditForm"  => true,
            "showCreateForm" => false,
            "editingItem"   => $editingItem,
            "title" => "Manage"
        ]);
    }

    public function edit(Request $request)
    {
        DB::update("UPDATE inventory SET name = :name, description = :description, price = :price WHERE code = :code", [
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'code'        => $request->input('code'),
        ]);

        return redirect("/manage")->with('success', 'Item updated successfully.');
    }
}
