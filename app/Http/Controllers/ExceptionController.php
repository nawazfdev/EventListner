<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\RelationNotFoundException;

class ExceptionController extends Controller
{
public function getdata(){

    try {
        $user = User::where('email', 'admin@gmail.com')->firstOrFail();
        $user->load(['project']);
        return $user;
    } catch (ModelNotFoundException $exception) {
        return view('usernotfound', compact('exception'));
    } catch (RelationNotFoundException $exception) {
        return view('RelationNotFound', compact('exception'));
        // dd($exception);
    } catch (\Exception $exception) {
        // here  we add multiple exception
    }
    
 
 

}
}