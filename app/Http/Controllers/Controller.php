<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;


    protected function register(Request $data)
    {
        if($data['role1']){
           $role = $data['role1'];
        }else{
            $role = $data['role'];
        }        
        $user = new User();
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->role = $role;
        $user->save();
        return view('Auth.register');
    }
    


}
