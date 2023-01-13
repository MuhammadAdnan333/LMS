<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

 
class LoginController extends Controller
{
   //
//    function userLogin(Request $req){
//     $em = $req->input('email');
//     $pas = $req->input('password');
//     $email = User::whereLike(['username', 'email'], $search)->get();
//     $req->session()->put('email',$data);
//     return redirect('profile');   
//   }
  public function index(){
   
     
     return User::whereLike(['email'], $search)->get();
   }
    
}