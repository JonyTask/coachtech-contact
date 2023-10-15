<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(){
        return view('index');
    }

    public function confirm(ContactRequest $request){
        $familyName=implode(",",$request->only(['family-name']));
        $firstName=implode(",",$request->only(['first-name']));
        $fullName=$familyName."　".$firstName;

        $firstTel=implode(",",$request->only(['first-three']));
        $secondTel=implode(",",$request->only(['second-three']));
        $thirdTel=implode(",",$request->only(['third-three']));
        $tell=$firstTel.$secondTel.$thirdTel;

        $contact=$request->only(['gender','email','first-three','second-three','third-three','address','building','category_id','detail']);


        return view('confirm',['contact'=>$contact,'fullname'=>$fullName,'tell'=>$tell]);
    }
}
