<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTableRequest;
use App\Http\Resources\TableResource;
use Illuminate\Http\Request;
use App\Models\Table;

class TableController extends Controller
{

    public function index()
    {
        $table = Table::all();
        return response()->json($table);
    } //index


    public function store(Request $request)
    {
        $new_table = new Table();
        $new_table->name = $request->name;
        $new_table->save();
        return TableResource::make($new_table);
    } //store


    public function show($id)
    {
        return TableResource::make(Table::where('id', $id)->firstOrFail());
    } //show


    public function edit($id)
    {
    } //edit


    public function update(Request $request, $id)
    {
        if (Table::where('id', $id)->exists()) {
            $table = Table::find($id);
            $table->name = $request->name;
            $table->save();
            return response()->json([
                "message" => "Table updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Table not found"
            ], 404);
        }

        //return TableResource::make(Table::where('id', $id)->update('name', $request->name));
    } //update

    public function destroy($id)
    {
    } //destroy
}
