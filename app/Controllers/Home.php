<?php
namespace App\Controllers;

use Kancil\Core\BaseController;
use Kancil\Core\Database;
use Kancil\Core\Parser;
use Kancil\Core\Auth;

class Home extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index( $id = "")
    {
        $auth = new Auth;
        $parser = new Parser();
        $db = new Database();

        $auth->userLogin($db, "piepin", md5("password"));

        if (!empty($id))
        {
            $rows["skemas"] = $db->find("skema", "skema_id='$id'");
        } else {
            $rows["skemas"] = $db->find("skema", "skema_id>0");
        }

        echo $parser->render("layout.html", $rows);
    }
}