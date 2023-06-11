<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //home Page
public function master(){
$cart=Cart::whrere("user_id",Auth::user()->id)->get();
$history=Order::where("user_id",Auth::user()->id)->get();
return view("user.layout.master",compact("cart","history"));
}
public function home(){
$products=Product::orderBy("created_at","desc")->get();
$categories=Category::get();
$cart=Cart::where("user_id",Auth::user()->id)->get();
$history=Order::where("user_id",Auth::user()->id)->get();
return view("user.home",compact("products","categories","cart","history"));
}
//filter
public function UserProductFilter($categoryId){
    $products=Product::where("category_id",$categoryId)->OrderBy("created_at","desc")->get();
    $categories=Category::get();
    $cart=Cart::where("user_id",Auth::user()->id)->get();
    $history=Order::where("user_id",Auth::user()->id)->get();
return view("user.product.menu",compact("products","categories","cart","history"));
    }
//..................uer account.............................
public function account(){
$users=User::where("id",Auth::user()->id)->first();
return view("user.account.account",compact("users"));
}
public function edit(){
$user=User::where('id',Auth::user()->id)->first();
return view("user.account.edit",compact("user"));
}
public function update(Request $request){
$this->getAccountValidationCheck($request);
$data=$this->getUserData($request);
$fileName=uniqid().$request->file("image")->getClientOriginalName();
$request->file("image")->storeAs("public",$fileName);
$data["image"]=$fileName;
User::where("id",Auth::user()->id)->update($data);
return redirect()->route("user#account");
}
public function profile(){
return view("user.account.profile");
}

//get account data and validation
private function getAccountValidationCheck($request){
$validationCheck=[
"name"=>"required|min:6",
"email"=>"required",
"phone"=>"required",
"address"=>"required",
"gender"=>"required"
];
$validationFeedBack=[
"name.required"=>"name field need to fills",
"email.required"=>"email field need to fills",
"phone.required"=>"phone field need to fils",
"address.required"=>"address field need to fills",
"gender.required"=>"gender field need to fills"
];
Validator::make($request->all(),$validationCheck,$validationFeedBack)->validate();
}
private function getUserData($request){
return[
"name"=>$request->name,
"email"=>$request->email,
"phone"=>$request->phone,
"address"=>$request->address,
"gender"=>$request->gender
];
}

}
