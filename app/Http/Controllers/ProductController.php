<?php

namespace App\Http\Controllers;
use Storage;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    //list Page
public function ListPage(){
$products=Product::select("products.*","categories.name as category_name")
->when(request("searchKey"),function($query){
    $query->orWhere("products.name","like","%".request("searchKey")."%")
    ->orWhere("products.price","like","%".request("searchKey")."%");
    })
->leftJoin("categories","products.category_id","categories.id")
->orderBy("created_at","desc")->paginate(6);
$products->appends(request()->all());
return view("admin.product.list",compact("products"));
}
//create
public function createPage(){
$categories=Category::select("id","name")->get();
return view("admin.product.create",compact("categories"));
}

//creating
public function create(Request $request){
$this->getValidationCheck($request,"create");
$data=$this->getData($request);
$fileName=uniqid().$request->file("image")->getClientOriginalName();
$request->file("image")->storeAs("public",$fileName);
$data["image"]=$fileName;
Product::create($data);
return redirect()->route("admin#productListPage");
}
//more
public function more($id){
$product=Product::where("id",$id)->first()
->select("products.*","categories.name as category_name")
->leftJoin("categories","products.category_id","categories.id")
->where("products.id",$id)->first();
return view("admin.product.more",compact("product"));
}
//edit
public function editPage($id){
$products=Product::where('id',$id)->first();
$categories=Category::get();
return view("admin.product.edit",compact("products","categories"));
}
//update
public function update(Request $request){
$this->getValidationCheck($request,"update");
$update=$this->getData($request);
if($request->hasFile("image")){
$dbImage=Product::where('id',$request->productId)->first();
$oldImage=$dbImage->image;

if($oldImage != null){
Storage::delete("public/".$oldImage);
}
$fileName=uniqid().$request->file("image")->getClientOriginalName();
$request->file("image")->storeAs("public",$fileName);
$update["image"]=$fileName;
}
Product::where('id',$request->productId)->update($update);
return redirect()->route("admin#productListPage")->with(["updateSuccess"=>"updating success"]);
}
//delete
public function delete($id){
Product::where("id",$id)->delete();
return redirect()->route("admin#productListPage");
}
//..................................user.............................................
//list
public function UserMenuPage(){
$products=Product::orderBy("created_at","desc")->get();
$categories=Category::get();
return view("user.product.menu",compact("products","categories"));
}

//create
private function getValidationCheck($request,$action){
$validateCheck=[
"name"=>"required",
"image"=>"required|mimes:png,jpg,jpeg,web|file",
"categoryId"=>"required",
"description"=>"required",
"price"=>"required",
];
$customizeValidation=[
"name.required"=>"product name need to fills",
"image.required"=>"image need to fills",
"categoryId.required"=>"category name need to fills",
"description.required"=>"description need to fills",
"price.required"=>"price need to fills"
];
$validateCheck["image"]=$action=="create"?"required|mimes:png,jpg,jpeg,web|file":"mimes:png,jpg,jpeg,web|file";
Validator::make($request->all(),$validateCheck,$customizeValidation)->validate();
}

//getting create datea
private function getData($request){
return[
"name"=>$request->name,
"category_id"=>$request->categoryId,
"description"=>$request->description,
"price"=>$request->price
];
}
}
