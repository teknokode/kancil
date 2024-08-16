<?php
namespace App\Controllers;

use Kancil\Core\Database;
use Kancil\Core\Api;
use Kancil\Core\Auth;

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
        $auth = new Auth;
        $db = new Database();

        $req = $api->requestJSON();

        $username = $req["username"];
        $password = $req["password"];

        if ( $auth->userLogin($db, $username, md5($password)) )
        {
            $payload = [
                'username' => $username,
                "sub"=> "Authorization", 
                "iss"=> "Kancil Framework", 
                'iat' => time(),
                'exp' => time()+2592000 // 30 hari 
            ];

            $jwt = $auth->createJwtToken( $payload );
            print $api->responseJSON( ["token" => $jwt ] );

        } else {

            print $api->responseError( "Username atau password tidak valid", 401);

        }
    }

    public function token()
    {
        $api = new Api;

        $payload = [
            'username' => "udin",
            "sub"=> "Authorization", 
            "iss"=> "Kancil Framework", 
            'iat' => time(),
            'exp' => time()+2592000 // 30 hari 
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