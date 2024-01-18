<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{

    public function index($id)
    {
        //
        $products = Product::where("category", $id)->get();
        return view("products", compact("products"));
    }
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
                "description" => "required",
                "category" => "required|numeric",
            ]
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "failed to create the product"]);
        } else {
            if ($request->hasFile('image')) {
                $product = new Product();
                $product->name = $request->name;
                $product->description = $request->description;
                $product->category = $request->category;
                $product->save();

                $lastInsertedId = $product->id;
                $image_name = '' . $lastInsertedId . '.jpg';

                $request->file('image')->storeAs('public/products', $image_name);
                $product->image = $image_name;

                $product->save();
                return redirect()->back()->with(["success" => "the product has been created successfully !!"]);
            } else {
                return redirect()->back()->with(["failed" => "failed to create the product !!"]);
            }
        }
        //
    }

    public function read($id)
    {
        //
        $product = Product::find($id);
        return view("product", compact("product"));
    }
    public function delete(Request $request)
    {
        //
        $product = Product::find($request->id);
        $product->delete();
        return redirect()->back()->with(["success" => "the product has been deleted successfully !!"]);
    }
    public function update(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "id" => "required",
                "name" => "required",
                "description" => "required"
            ]
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "failed to update the product"]);
        } else {
            $product = Product::find($request->id);
            $product->name = $request->name;
            $product->description = $request->description;
            $product->category = $request->category;

            if ($request->hasFile('image')) {
                $image_name = '' . $product->id . '.jpg';
                $request->file('image')->storeAs('public/products', $image_name);
                $product->image = $image_name;
            }
            $succes=$product->save();
            if($succes){
                return redirect()->back()->with(["success" => "the product has been updated successfully !!"]);
            }else{
                return redirect()->back()->with(["failed" => "failed to update the product"]);

            }
        }
    }
   
}
