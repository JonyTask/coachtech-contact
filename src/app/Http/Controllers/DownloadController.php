<?php

namespace App\Http\Controllers;

use App\Exports\ContactsExport;
use Maatwebsite\Excel\Facades\Excel;

class DownloadController extends Controller
{
    public function Download(){
       return Excel::download(new ContactsExport, 'contacts.xlsx');
    }
}
