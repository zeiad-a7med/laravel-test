<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index($id)
    {
        //
        $categories = category::get();
        return view("categories", compact("categories"));
    }
    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required",
            ]
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "failed to create the category"]);
        } else {
            $category = new category();
                $category->name = $request->name;
                $success=$category->save();
            if ($success) {
                
                return redirect()->back()->with(["success" => "the category has been created successfully !!"]);
            } else {
                return redirect()->back()->with(["failed" => "failed to create the category !!"]);
            }
        }
        //
    }

    public function read($id)
    {
        //
        $category = Category::find($id);
        return view("category", compact("category"));
    }
    public function delete(Request $request)
    {
        //
        $category = Category::find($request->id);
        $category->delete();
        return redirect()->back()->with(["success" => "the category has been deleted successfully !!"]);
    }
    public function update(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "id" => "required",
                "name" => "required",
            ]
        );
        // return $request;
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInputs($request->all())->with(["failed" => "failed to update the category"]);
        } else {
            $category = Category::find($request->id);
            $category->name = $request->name;

            $succes=$category->save();
            if($succes){
                return redirect()->back()->with(["success" => "the category has been updated successfully !!"]);
            }else{
                return redirect()->back()->with(["failed" => "failed to update the category"]);

            }
        }
    }
}
