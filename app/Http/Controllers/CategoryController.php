<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    //direct category list page
public function list(){
    $category=Category::orderBy("created_at","desc")->when(request("searchKey"),function($query){
        $key=request("searchKey");
        $query->Where("name","like","%".$key."%");
        })->paginate(5);
return view("admin.category.list",compact("category"));
}

//ceate  category page
public function category(){
return view("admin.category.category");
}
public function addCategory(Request $request){
$this->getValidationCheck($request);
$data=$this->getCategoryData($request);
$data=Category::create($data);
return redirect()->route("admin#adminList");
}
public function categoryDelete($id){
$data = Category::where("id",$id)->delete();
return back();
}
//category edit
public function categoryEditPage($id){
$category=Category::where("id",$id)->first();
return view("admin.category.edit",compact("category"));
}
public function categoryEdit(Request $request){
$this->getValidationCheck($request);
$getData=$this->getCategoryData($request);
$get =Category::where("id",$request->categoryId)->update($getData);
return redirect()->route("admin#adminList");
}


//validation check
private function getValidationCheck($request){
$validation=[
"name"=>"required|min:4"
];
$validationRules=[
"name.required"=>"name need to fills"
];
Validator::make($request->all(),$validation,$validationRules)->validate();
}

//get data
private function getCategoryData($request){
return[
"name"=>$request->name
];
}


}
