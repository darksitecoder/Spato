<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function productList(){
        $products = Product::all();

        return response()->json(['Product Details' => $products]);
    }

    public function addproductList(Request $request){
        $validator = Validator::make($request->all(), [
            'productName' => 'required',
            'productQuantity' => 'required',
            'productRateForNormalUsers' => 'required',
            'productRateForB2BUsers' => 'required',
            'productRateForB2CUsers' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);


        if ($validator->fails()) {
            // Return validation errors in the response
            return response()->json($validator->errors());
        }

        // Create a new user
        $Product = Product::create([
            'productName' => $request->input('productName') ,
            'productQuantity' => $request->input('productQuantity'),
            'productRateForNormalUsers' => $request->input('productRateForNormalUsers'),
            'productRateForB2BUsers' => $request->input('productRateForB2BUsers'),
            'productRateForB2CUsers' => $request->input('productRateForB2CUsers'),
            'description' => $request->input('description'), 
            'image' => $request->input('image'),
          
        ]);

        if($Product){

        return response()->json(['message' => 'Product Added successfully']);

        }

        else{

        return response()->json(['message' => 'Product not Added successfully']);

        }
    }
}
