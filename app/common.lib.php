<?php
namespace App\Http;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommonLib
{

    public static function login_admin()
    {   
        $result         =   array();

        $result         =   [
            'admin_seq'     =>  53,
            'company_seq'   =>  29
        ];   

        return $result;
    }
}