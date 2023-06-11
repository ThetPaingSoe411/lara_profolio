<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //list
public function list(){
$contacts=Contact::orderBy("created_at","desc")->get();
return view("admin.contact.list",compact("contacts"));
}
public function more($id){
$contact=Contact::where("id",$id)->first();
return view("admin.contact.more",compact("contact"));
}

//delete
public function delete($id){
Contact::where('id',$id)->delete();
return back();
}
}
