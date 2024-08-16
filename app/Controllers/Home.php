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

        $auth->userLogin($db, "demo", md5("password"));

        if (!empty($id))
        {
            $rows["tugas"] = $db->find("tugas", "tugas_id='$id'");
        } else {
            $rows["tugas"] = $db->find("tugas", "tugas_id>0");
        }

        echo $parser->render("layout.html", $rows);
    }
}