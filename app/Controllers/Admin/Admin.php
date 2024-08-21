<?php

namespace App\Controllers\Admin;

use Kancil\Core\BaseController;
use Kancil\Core\Database;
use Kancil\Core\Parser;
use Kancil\Core\Auth;

class Admin extends BaseController
{
    public function index()
    {
        $parser = new Parser;
        return $parser->render("admin/admin.html", []);

    }
}

