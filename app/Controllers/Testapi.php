<?php
namespace App\Controllers;

use Kancil\Core\Database;
use Kancil\Core\Api;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;


class Testapi
{
    public function index()
    {
        $api = new Api;
        $json = $api->requestJSON();
        print $api->responseJSON( $json );
    }

    public function auth()
    {
        $api = new Api;

        $jwt = $api->requestAuth();
        print $api->responseJSON( ["auth" => $jwt ] );
    }

    public function token()
    {
        $api = new Api;

        $payload = [
            'username' => 'udin',
            'domain' => 'http://www.contoh.com',
            'iat' => 1356999524,
            'exp' => 1357000000
        ];

        $jwt = JWT::encode($payload, SECRET_KEY, 'HS256');
        print $api->responseJSON( ["token" => $jwt ] );
    }


    public function skema()
    {
        $db = new Database;
        $api = new Api;

        $data = $db->select("skema","*");
        print $api->responseJSON( $data );
    }
}