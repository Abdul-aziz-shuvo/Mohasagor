<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function index() {
        $products = Product::with('stocks','stocks.size','stocks.color','stocks.imageGroup')->get();
        return response()->json($products);
    }

    public function store(Request $request) {
//    dd($request->all());
//        $data = json_decode( $request,false);
//    return response()->json($request);
//      $product =  Product::create([
//            'name' => $request->name,
//            'price' => $request->price,
//            'sell_price' => $request->sell_price,
//            'sub_sub_category_id' => $request->subSubCategoryId,
//        ]);

//        return response()->json($request->stock);
        $stockArray = array_map(function ($value) {
            return $value;
        },$request->stock);

//        return response()->json($stockArray);
        foreach ($stockArray as $key=>$stock){
//

//
            return response()->json($request->hasFile($request->stock[$key]['images']));



            return response()->json( $request->hasFile('stock*.images'));

             foreach ($request->file('stock.*.file') as $image){

                return response()->json( $image);

                 if(is_file($image)){
                     $img = $product->id . $image->getClientOrginalExtention();
                     if(!Storage::exists('storage/product/images')){
                         Storage::makeDirectory('storage/product/images/'.$product->id.'');
                         Storage::put('storage/product/images/'.$product->id.'/'.$img, $image);
                     }else{
                         Storage::put('storage/product/images/'.$product->id.'/'.$img, $image);

                     }
                 }



             }



        }



//      foreach ($request->stock as $stock) {
//          return response()->json($stock);
//      }
//        return response()->json($request);
    }
}
