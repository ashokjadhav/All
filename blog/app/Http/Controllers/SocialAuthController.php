<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
      // when facebook call us a with token
      $providerUser = Socialite::driver('facebook')->user();
      print_r($providerUser);
      exit;

    }

    public function redirectGoogle()
    {
      return Socialite::driver('google')->scopes(['profile','email'])->redirect();
    }

    public function callbackGoogle()
    {
      // when google call us a with token
      $result = Socialite::driver('google')->user();
      echo '<pre>';
      print_r($result);
      exit;
      $user = DB::select('select id from users where email = ?', array($result['email']));

            if (empty($user)) {
                $data = new User;
                $data->Username = $result['name'];
                $data->email = $result['email'];
                $data->first_name = $result['given_name'];
                $data->last_name = $result['family_name'];
                $data->save();
            }
            Auth::login($user);
            return Redirect::to('/');

    }
}
