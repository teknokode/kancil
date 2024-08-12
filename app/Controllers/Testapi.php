<?php
namespace App\Controllers;

//use App\Core\BaseController;
use App\Core\Database;
//use App\Core\Parser;
//use App\Core\Auth;
use App\Core\Api;

class Testapi
{


    public function index()
    {
        $api = new Api;

        //print $api->requestMethod();
        $json = $api->requestJSON();

        print $api->responseJSON( $json );
    }

    public function auth()
    {
        $api = new Api;

        $jwt = $api->requestAuth();
        print $api->responseJSON( ["auth" => $jwt ] );
    }

    public function skema()
    {
        $db = new Database;
        $api = new Api;

        $data = $db->select("skema","*");
        print $api->responseJSON( $data );

    }

}