<?php

namespace App\Http\Controllers;

use App\Models\c;
use App\Models\Order;
use App\Models\OrderList;
use Illuminate\Http\Request;

class OrderController extends Controller
{
//admin order list
public function list(){
$orders=Order::select("orders.*","users.name as user_name")
->leftJoin("users","users.id","orders.user_id")
->when(request("searchKey"),function($query){
$query->orwhere("users.name","like","%".request("searchKey")."%")
->orwhere("orders.order_code","like","%".request("searchKey")."%")
->orwhere("orders.status","like","%".request("searchKey")."%");
})
->orderBy("created_at","desc")->paginate(5);
$orders->appends(request()->all());
return view("admin.order.list",compact("orders"));
}

//status change
public function change(Request $request){
Order::where("id",$request->orderId)->update([
"status"=>$request->status
]);
$orders=Order::select("orders.*","users.name as user_name")
->leftJoin("users","users.id","orders.user_id")
->orderBy("created_at","desc")->get();
return response([
"status"=>"true"
],200);
}
//orderDelete delete
public function delete($id){
Order::where('id',$id)->delete();
return back();
}
//order detail
public function detail($orderCode){
$order=Order::where("order_code",$orderCode)->first();
$orderList=OrderList::select("order_lists.*","users.name as user_name","products.name as product_name","products.image as product_image")
->leftJoin("users","users.id","order_lists.user_id")
->leftJoin("products","products.id","order_lists.product_id")
->where("order_code",$orderCode)->get();
return view("admin.order.detail",compact("order","orderList"));
}
}
