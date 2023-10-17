<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
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
        $contacts=Contact::Paginate(10);

        for($i=0;$i<count($contacts);$i++){
            $contact_gender=$contacts[$i]["gender"];
            $contact_category=$contacts[$i]["category_id"];
            if($contact_gender==1){
                $contacts[$i]["gender"]="男性";
            }elseif($contact_gender==2){
                $contacts[$i]["gender"]="女性";
            }elseif($contact_gender==3){
                $contacts[$i]["gender"]="その他";
            }
            
            if($contact_category==1){
                $contacts[$i]["category_id"]="商品のお届けについて";
            }elseif($contact_category==2){
                $contacts[$i]["category_id"]="商品の交換について";
            }elseif($contact_category==3){
                $contacts[$i]["category_id"]="商品トラブル";
            }elseif($contact_category==4){
                $contacts[$i]["category_id"]="ショップへのお問い合わせ";
            }elseif($contact_category==5){
                $contacts[$i]["category_id"]="その他";
            }
        }

        return view('admin',compact('contacts'));
    }

    public function search(Request $request){

    }

    public function registerShow(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){

    }

    public function loginShow(){
        return view('auth.login');
    }

    public function login(LoginRequest $request){

    }
}
