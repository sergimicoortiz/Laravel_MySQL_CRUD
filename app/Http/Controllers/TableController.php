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
        return TableResource::collection(Table::all());
    } //index

    public function store(StoreTableRequest $request)
    {
        return TableResource::make(Table::create($request->validated()));
    } //store

    public function show($id)
    {
        return TableResource::make(Table::where('id', $id)->firstOrFail());
    } //show

    public function update(StoreTableRequest $request, $id)
    {
        $update = Table::where('id', $id)->update($request->validated());
        if ($update == 1) {
            return TableResource::make(Table::where('id', $id)->firstOrFail());
        } else {
            return response()->json([
                "message" => "Table not found"
            ], 404);
        };
    } //update

    public function destroy($id)
    {
        $delete = Table::where('id', $id)->delete();
        if ($delete == 1) {
            return response()->json([
                "message" => "Table deleted"
            ], 200);
        } else {
            return response()->json([
                "message" => "Table not found"
            ], 404);
        };
    } //destroy
}//class