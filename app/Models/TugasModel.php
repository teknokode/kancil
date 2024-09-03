<?php
namespace App\Models;

//use Kancil\Core\Database;
use Kancil\Core\Model;


class TugasModel extends Model
{
    protected $tableName = "tugas";
    protected $primaryKey = "tugas_id";
    //protected $db;

    // Seharusnya fungsi ini ada di core Model
    // public function __construct()
    // {
    //     $this->db = new Database;
    // }
    
    // public function get()
    // {
    //     return $this->db->get( $this->tableName ,"*"); 
    // }

    // public function find()
    // {
    //     return $this->db->get( $this->tableName ,"*"); 
    // }
    // Seharusnya fungsi ini ada di core Model ^^^
}