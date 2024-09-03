<?php
namespace App\Controllers;

use Kancil\Core\Controller;
use Kancil\Core\Database;
use Kancil\Core\Parser;
use Kancil\Core\Auth;
use App\Models\TugasModel;

class Home extends Controller
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
        $tugas = new TugasModel;

        $auth->userLogin($db, "demo", md5("password"));

        if (!empty($id))
        {
            $rows["tugas"] = $tugas->find("tugas_id='$id'");
        } else {
            $rows["tugas"] = $tugas->get();
        }

        return $parser->render("layout.html", $rows);
    }
}