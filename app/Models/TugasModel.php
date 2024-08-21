<?php
namespace App\Models;

use Kancil\Core\Database;


class TugasModel // Harus di extends dari core Model
{
    protected $tableName = "tugas";
    protected $primaryKey = "tugas_id";
    protected $db;

    //  Seharusnya fungsi ini ada di core Model
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getAll()
    {
        return $this->db->select( $this->tableName ,"*"); 
    }
}