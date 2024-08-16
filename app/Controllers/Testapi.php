<?php
namespace App\Controllers;

use Kancil\Core\Database;
use Kancil\Core\Api;
use Kancil\Core\Auth;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Testapi
{
    protected $api;

    public function __construct()
    {
        $this->api = new Api;
    }

    public function index()
    {
        $json = $this->api->requestJSON();
        print $this->api->responseJSON( $json );
    }

    public function auth()
    {
        $auth = new Auth;
        $db = new Database();

        $req = $this->api->requestJSON();

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
            print $this->api->responseJSON( ["token" => $jwt ] );

        } else {

            print $api->responseError( "Username atau password tidak valid", 401);

        }
    }

    public function token()
    {
        $payload = [
            'username' => "udin",
            "sub"=> "Authorization", 
            "iss"=> "Kancil Framework", 
            'iat' => time(),
            'exp' => time()+2592000 // 30 hari 
        ];

        $jwt = JWT::encode($payload, SECRET_KEY, 'HS256');
        print $this->api->responseJSON( ["token" => $jwt ] );
    }

    public function skema()
    {
        $db = new Database;

        $data = $db->select("skema","*");
        print $this->api->responseJSON( $data );
    }
}