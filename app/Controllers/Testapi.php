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
        return $this->api->responseJSON( $json );
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
            return $this->api->responseJSON( ["token" => $jwt ] );

        } else {

            return $this->api->responseError( "Username atau password tidak valid", 401);

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
        return $this->api->responseJSON( ["token" => $jwt ] );
    }

    public function tugas()
    {
        $db = new Database;

        $data = $db->select("tugas","*");
        return $this->api->responseJSON( $data );
    }
}