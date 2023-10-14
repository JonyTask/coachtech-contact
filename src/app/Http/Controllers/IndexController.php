<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $contact=$request->only(['family-name','first-name','gender','email','first-three','second-three','third-three','address','building','category_id','detail']);
        return view('confirm',['contact'=>$contact]);
    }
}
