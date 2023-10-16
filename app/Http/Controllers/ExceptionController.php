<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExceptionController extends Controller
{
public function getdata(){

try {
    $user=User::where('email','admin@gmailsd.com')->firstOrFail();
    return $user;
} catch (\Exception $exception) {
    return view('usernotfound');
}


}
}
