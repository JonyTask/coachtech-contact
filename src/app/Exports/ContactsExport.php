<?php

namespace App\Exports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\FromCollection;

class ContactsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $contacts = Contact::all();
        for($i=0;$i<count($contacts);$i++){
            $contact_gender=$contacts[$i]["gender"];
            if($contact_gender==1){
                $contacts[$i]["gender"]="男性";
            }elseif($contact_gender==2){
                $contacts[$i]["gender"]="女性";
            }elseif($contact_gender==3){
                $contacts[$i]["gender"]="その他";
            }

            $contact_category=$contacts[$i]["category_id"];
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
        return $contacts;
    }
}
