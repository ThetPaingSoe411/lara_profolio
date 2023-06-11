<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
//direct login Page
public function loginPage(){
return view("auth.login");
}
public function registerPage(){
return view("auth.register");
}

//direct dashboard
public function dashboard(){
if(Auth::user()->role == "admin"){
return redirect()->route("admin#Home");
}else{
return redirect()->route("user#home");
}
}
//admin dash
public function Home(){
return view("admin.dashboard.dash");
}
// admin account
public function create(){
return view("admin.account.password");
}

//admin password change
public function passwordChange(Request $request){
    $this->passwordValidationCheck($request);
$useroldPassword=User::select("password")->where("id",Auth::user()->id)->first();
$dbHashValue=$useroldPassword->password;

if(Hash::check($request->oldPassword, $dbHashValue)){
$data=[
"password"=>Hash::make($request->newPassword)
];
User::where("id",Auth::user()->id)->update($data);
return back()->with(["changeSuccess"=>"Change Password.."]);
}
return back()->with(["notMatch"=>"password not match!"]);
}
//password Change...for user
public function ChangingPassword(Request $request){
$this->passwordValidationCheck($request);
$oldPassword=User::select("password")->where("id",Auth::user()->id)->first();
$dbHashValue=$oldPassword->password;
if(Hash::check($request->oldPassword,$dbHashValue)){
$data=[
"password"=>Hash::make($request->newPassword)
];
User::where("id",Auth::user()->id)->update($data);
return redirect()->route("user#home");
}
return back();
}

public function logoutPage(){
    return view("user.account.logout");
    }
//admin password Validation
private function passwordValidationCheck($request){
$passwordValidationRules=[
"oldPassword"=>"required|min:6",
"newPassword"=>"required|min:6",
"confirmPassword"=>"required|min:6|same:newPassword"
];
$passwordValidationFeedBack=[
"oldPassword.required"=>"old password need to fills",
"newPassword.required"=>"new password need to fills",
"confirmPassword.required"=>"confirm password need to fills"
];
Validator::make($request->all(),$passwordValidationRules,$passwordValidationFeedBack)->validate();
}
}
