<?php

namespace App\Http\Controllers\admin;
use Storage;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
//admin account Page
public function createPage(){
return view("admin.account.create");
}

//admin edit page
public function editPage(){
return view("admin.account.edit");
}

public function edit($id,Request $request){
$this->accountValidationCheck($request);
$data=$this->getAccountData($request);

if($request->hasFile('image')){
    $dbImage=User::where('id',$id)->first();
    $dbImage=$dbImage->image;

    if($dbImage != null){
    Storage::delete('public/'.$dbImage);
    }
    $fileName=uniqid().$request->file('image')->getClientOriginalName();
    $request->file('image')->storeAs('public',$fileName);
    $data['image']=$fileName;
    }
  User::where('id',$id)->update($data);
return redirect()->route("admin#accountPage")->with(["createSuccess"=>"uploading success"]);
}
//admin Page
public function adminPage(){
$admins=User::when(request("searchKey"),function($query){
$key=request("searchKey");
$query->orWhere("name","like","%".$key."%")
->orWhere("email","like","%".$key."%")
->orWhere("address","like","%".$key."%")
->orWhere("phone","like","%".$key."%");
})
->where("role","admin")->paginate(4);
$admins->appends(request()->all());
return view("admin.admin.list",compact("admins"));
}
//admin role change
public function changeRolePage($id){
$adminid=User::where("id",$id)->first();
return view("admin.admin.chnageRole",compact("adminid"));
}
public function roleChange(Request $request){
$data=[
"role"=>$request->role
];
User::where("id",$request->adminId)->update($data);
return redirect()->route("admin#adminPage");
}
//admin delete
public function adminDelete ($id){
User::where("id",$id)->delete();
return back();
}
//admin more
public function adminMore($id){
$admins=User::where("id",$id)->first();
return view("admin.admin.more",compact("admins"));
}
//admin user list Page
public function userListPage(){
$users=User::when(request("searchKey"),function($query){
    $key=request("searchKey");
    $query->orWhere("name","like","%".$key."%")
    ->orWhere("email","like","%".$key."%")
    ->orWhere("address","like","%".$key."%")
    ->orWhere("phone","like","%".$key."%");
    })
->where("role","user")->paginate(4);
$users->appends(request()->all());
return view("admin.user.list",compact("users"));
}
public function userCreate($id){
$user=User::where("id",$id)->first();
return view("admin.user.create",compact("user"));
}
public function userChange(Request $request){
$change=[
"role"=>$request->role
];
User::where("id",$request->userId)->update($change);
return redirect()->route("admin#userListPage");
}
//usr delete and more page
public function userDelete($id){
User::where("id",$id)->delete();
return back();
}
public function userMore($id){
$user=User::where("id",$id)->first();
return view("admin.user.more",compact("user"));
}
//admin account data and validation
private function accountValidationCheck($request){
$validationRules=[
"name"=>"required|min:4",
"image"=>"mimes:png,jpg,jpeg,web|file",
"address"=>"required",
"gender"=>"required",
"phone"=>"required",
"email"=>"required"
];
Validator::make($request->all(),$validationRules)->validate();
}

private function getAccountData($request){
return [
"name"=>$request->name,
"email"=>$request->email,
"phone"=>$request->phone,
"gender"=>$request->gender,
"address"=>$request->address,
"created_at"=>Carbon::now()
];
}
}
