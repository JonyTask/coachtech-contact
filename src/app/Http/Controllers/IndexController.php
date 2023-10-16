<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class IndexController extends Controller
{
    public function index(Request $request){
        $params=[
            'familyName'=> $request->session()->get('family-name'),
            'firstName'=> $request->session()->get('first-name'),
            'gender'=> $request->session()->get('gender'),
            'email'=> $request->session()->get('email'),
            'firstThree'=> $request->session()->get('first-three'),
            'secondThree'=> $request->session()->get('second-three'),
            'thirdThree'=> $request->session()->get('third-three'),
            'address'=> $request->session()->get('address'),
            'building'=> $request->session()->get('building'),
            'category_id'=> $request->session()->get('category_id'),
            'detail'=> $request->session()->get('detail'),
        ];
        return view('index',$params);
    }

    public function confirm(ContactRequest $request){

        $request->session()->put('family-name',$request->only(['family-name']));
        $request->session()->put('first-name',$request->only(['first-name']));
        $request->session()->put('gender',$request->only(['gender']));
        $request->session()->put('email',$request->only(['email']));
        $request->session()->put('first-three',$request->only(['first-three']));
        $request->session()->put('second-three',$request->only(['second-three']));
        $request->session()->put('third-three',$request->only(['third-three']));
        $request->session()->put('address',$request->only(['address']));
        $request->session()->put('building',$request->only(['building']));
        $request->session()->put('category_id',$request->only(['category_id']));
        $request->session()->put('detail',$request->only(['detail']));

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

    public function store(Request $request){
        $genderName=implode(",",$request->only(['gender']));
        if($genderName=="男性"){
            $gender=1;
        }elseif($genderName=="女性"){
            $gender=2;
        }elseif($genderName=="その他"){
            $gender=3;
        }

        $categoryContent=implode(",",$request->only(['category_id']));
        if($categoryContent=="商品のお届けについて"){
            $category_id=1;
        }elseif($categoryContent=="商品の交換について"){
            $category_id=2;
        }elseif($categoryContent=="商品トラブル"){
            $category_id=3;
        }elseif($categoryContent=="ショップへのお問い合わせ"){
            $category_id=4;
        }elseif($categoryContent=="その他"){
            $category_id=5;
        }

        $form=$request->all();
        $form["gender"]=$gender;
        $form["category_id"]=$category_id;
        Contact::create($form);
        return view('thanks');
    }

    public function admin(){
        return view('admin');
    }
}
