<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function addProduct (Request $request){
        $item = new Products();
        $item->name = $request->name;
        $item->value = $request->value;
        $item->quantity = $request->quantity;

        $item->save();
        return response()->json('add successfully');
    }

    public function updateProduct (Request $request){
        $item = Products::findorfail($request->id);

        $item->name = $request->name;
        $item->value = $request->value;
        $item->quantity = $request->quantity;

        $item->update();
        return response()->json('update successfully');
    }

    public function deleteProduct (Request $request){
        $item = Products::findorfail($request->id)->delete();

        return response()->json('delete successfully');
    }

    public function getProduct (Request $request){
        $item = Products::all();
        return response()->json($item);

    }
    public function getProductById (Request $request, $id){
        $item = Products::find($id);
        return response()->json($item);

    }
    public function getProductInProduct ($id){
        $item = Categorie::find($id)->product;
        return response()->json($item);

    }
}
