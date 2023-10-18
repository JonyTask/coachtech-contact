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
        }

        return view('admin',compact('contacts'));
    }

    public function search(Request $request){
        //where('fullname','like','%'.$request->name_email_search.'%')->Where('email','like','%'.$request->name_email_search.'%')->Where('category_id',$request->category_search)->Where('created_at','like','%'.$request->date_search.'%')
        if(isset($request->gender_search) && isset($request->category_search) && isset($request->date_search)){
            $contacts=Contact::where('gender',$request->gender_search)->where('category_id',$request->category_search)->where('created_at','like','%'.$request->date_search.'%')->Paginate(10);
        }elseif(isset($request->name_email_search)){
            $contacts=Contact::where('fullname','like','%'.$request->name_email_search.'%')->orWhere('email','like','%'.$request->name_email_search.'%')->Paginate(10);
        }elseif(!isset($request->date_search)){
            $contacts=Contact::where('gender',$request->gender_search)->where('category_id',$request->category_search)->Paginate(10);
        }elseif(!isset($request->gender_search)){
            $contacts=Contact::where('category_id',$request->category_search)->where('created_at','like','%'.$request->date_search.'%')->Paginate(10);
        }elseif(!isset($request->category_search)){
            $contacts=Contact::where('gender',$request->gender_search)->where('created_at','like','%'.$request->date_search.'%')->Paginate(10);
        }

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
        }

        return view('admin',compact('contacts'));
    }
}
