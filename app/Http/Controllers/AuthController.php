<?php

namespace App\Http\Controllers;

use Socialite;
use Request;
use App\Models\User;

class AuthController extends Controller
{
  public function login(){
    $token = Request::input('access_token');
    $userInfo = Socialite::driver('google')->userFromToken($token);

    $new_token = md5($token);
    $user = User::where('email', $userInfo->getEmail())->first();
    if($user){
      $user->update(['api_token'=>$new_token]);
    } else {
      $user = new User;
      $user->api_token = $new_token;
      $user->email = $userInfo->getEmail();
      $user->name = $userInfo->getName();
      $user->save();
    }

    return ['access_token'=>$new_token,'code'=>200];
  }

  public function logout() {
    
  }
}
