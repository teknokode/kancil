<?php
namespace App\Controllers\Admin;

use Kancil\Core\Controller;
use Kancil\Core\Database;
use Kancil\Core\Parser;
use Kancil\Core\Auth;

class Admin extends Controller
{
    public function index()
    {
        $parser = new Parser;
        return $parser->render("admin/admin.html", []);
    }
}

