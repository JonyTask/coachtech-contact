<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $guarded =['id'];
    protected $filable =[
        'category_id',
        'fullname',
        'gender',
        'email',
        'tell',
        'address',
        'building',
        'detail',
    ];

    public static $rules = array(
        'category_id'=>'integer|min:1|max:5',
        'gender'=>'integer|min:1|max:3',
        'email'=>'email',
        'tell'=>'tel',
    );

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function getContent(){
        return optional($this->category)->content;
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
    }

    public function scopeNameEmail($query,$nameEmail){
        if(!empty($nameEmail)){
            $query->where('fullname','like','%'. $nameEmail.'%');
            $query->where('email','like','%'. $nameEmail.'%');
        }
    }

    public function scopeGender($query,$gender){
        if(!empty($gender)){
            $query->where('gender',$gender);
        }
    }

    public function scopeDate($query,$date){
        if(!empty($date)){
            $query->where('create_at','like','%'.$date.'%');
        }
    }
}

