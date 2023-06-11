<?php

namespace App\Http\Controllers;


use App\Models\book;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
//admin...................
public function list(){
$books=book::orderBy("created_at","desc")
->when(request("key"),function($query){
$key=request("key");
$query->orWhere("name","like","%".$key."%")
->orWhere("email","like","%".$key."%")
->orWhere("date","like","%".$key."%")
->orWhere("time","like","%".$key."%")
->orWhere("people","like","%".$key."%");
})->paginate(5);
$books->appends(request()->all());
return view("admin.book.list",compact("books"));
}

public function more($id){
$book=book::where('id',$id)->first();
return view("admin.book.more",compact("book"));
}
public function delete($id){
book::where("id",$id)->delete();
return back();
}


//user/................................
    //book table
public function bookTable(Request $request){
$this->bookValidationCheck($request);
$data=$this->bookingDataGet($request);
book::orderBy("created_at","desc")->create($data);
return back()->with(["bookSuccess"=>"booking Success"]);
}
//contact
public function contact(Request $request){
$this->contactValidationCheck($request);
$placeData=$this->contactData($request);
Contact::orderBy("created_at","desc")->create($placeData);
return back()->with(["contactSuccess"=>"contact Success"]);
}


//booking validation
private function bookValidationCheck($request){
$validateCheck=[
"name"=>"required",
"email"=>"required",
"phone"=>"required",
"date"=>"required",
"time"=>"required",
"people"=>"required",
"message"=>"required"
];
$ValidationRule=[
"name.required"=>"name field need to fills",
"email.required"=>"email field need to fills",
"phone.required"=>"phone field need to fills",
"date.required"=>"date field need to fills",
"time.required"=>"time field need to fills",
"people.required"=>"people field need to fills",
"message.required"=>"message field need to fills"
];
Validator::make($request->all(),$validateCheck,$ValidationRule)->validate();
}
//booking data get
private function bookingDataGet($request){
return[
"name"=>$request->name,
"email"=>$request->email,
"phone"=>$request->phone,
"date"=>$request->date,
"time"=>$request->time,
"people"=>$request->people,
"message"=>$request->message
];
}
//contact
private function contactValidationCheck($request){
$validationRules =[
"contactName"=>"required",
"contactEmail"=>"required",
"subject"=>"required",
"contactMessage"=>"required"
];
$validationMessages=[
"contactName.required"=>"please fills your name field..",
"contactEmail.required"=>"please fills your email field...",
"subject.required"=>"please fills your place to deliver...",
"contactMessage.required"=>"please fills your message.."
];
Validator::make($request->all(),$validationRules,$validationMessages)->validate();
}
//contact data
private function contactData(Request $request){
return[
"name"=>$request->contactName,
"email"=>$request->contactEmail,
"subject"=>$request->subject,
"message"=>$request->contactMessage
];
}
}
