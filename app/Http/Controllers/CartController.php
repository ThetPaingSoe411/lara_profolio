<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

public function detail($productId){
$products=Product::where("id",$productId)->first();
return view("user.product.detail",compact("products"));
}
//add to cart
public function addCart(Request $request){
$data=$this->getAddCartData($request);
Cart::create($data);
$response=[
"message"=>"add to cart",
"status"=>"success"
];
return response()->json($response,200);
}

//......order.......
public function order(Request $request){
$total=0;
foreach ($request->all() as $item) {
$data =OrderList::create([
"user_id"=>$item["user_id"],
"product_id"=>$item["product_id"],
"qty"=>$item["qty"],
"total"=>$item["total"],
"order_code"=>$item["order_code"]
]);
$total +=$data->total;
}
Cart::where("user_id",Auth::user()->id)->delete();
Order::create([
"user_id"=>$data->user_id,
"order_code"=>$data->order_code,
"total_price"=>$total+3500
]);
return response([
"status"=>"true"
],200);
}

    //cart Page
public function UserCart(){
$carts=Cart::select("carts.*","products.image as product_image","products.name as product_name","products.price as product_price")
->orderBy("created_at","desc")
->leftJoin("products","products.id","carts.product_id")
->where("carts.user_id",Auth::user()->id)->get();
$totalPrice = 0;
foreach ($carts as $c) {
$totalPrice += $c->product_price * $c->qty;
}
return view("user.product.cart",compact("carts","totalPrice"));
    }
//history
public function history(){
$order=Order::orderBy("created_at","desc")
->where("user_id",Auth::user()->id)->paginate(5);
return view("user.product.history",compact("order"));
}
//clear cart
public function clearCart(){
Cart::where("user_id",Auth::user()->id)->delete();
}
//remove cart
public function removeCart(Request $request){
Cart::where("user_id",Auth::user()->id)->where("product_id",$request->productId)->delete();
}
//cart add
private function getAddCartData($request){
return[
"user_id"=>$request->userId,
"product_id"=>$request->productId,
"qty"=>$request->count,
"created_at"=>Carbon::now()
];
}
}





