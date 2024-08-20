<?php

namespace App\Filters;

class Login 
{
    public function index()
    {
        //redirect("skema/18", ["username"=>"aku"]);
        // $encrypted_txt = encrypt("Ada apa dengan kamu?");
        // echo "Encrypted Text = " .$encrypted_txt. "\n";
        // $decrypted_txt = decrypt($encrypted_txt);
        // echo "Decrypted Text =" .$decrypted_txt. "\n";

        // if (!isset($_SESSION["is_login"]))
        // {
        //     echo "Anda belum login";
        //     return false;
        // }
        return true;
    }
}