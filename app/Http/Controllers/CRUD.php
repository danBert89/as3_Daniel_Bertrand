<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
    public function search()
    {
        $inventory = DB::select("SELECT * FROM inventory");
        return view('/search', [
            "inventory" => $inventory,
            "title" => "Search",
            "showNoSearch" => true,
            "showSearch" => false
        ]);
    }

    public function searchResults(Request $request)

    {
        $low = $request->input('low');
        $high = $request->input('high');
        $term = "%" . $request->input('term') . "%";

        $inventory = "SELECT * FROM inventory 
        WHERE price BETWEEN :low AND :high
        AND CONCAT(name, ' ', description, ' ', code) LIKE :term";

        $inventory = DB::select($inventory, [
            'low' => $low,
            'high' => $high,
            'term' => $term
        ]);

        return view('/search', [
            "inventory" => $inventory,
            "title" => "Search",
            "showNoSearch" => false,
            "showSearch" => true
        ]);
    }
}
