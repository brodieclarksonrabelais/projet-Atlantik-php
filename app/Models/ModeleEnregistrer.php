<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleEnregistrer extends Model
{
    protected $table = 'enregistrer';
    protected $primaryKey = 'NORESERVATION, LETTRECATEGORIE, NOTYPE'; 
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['QUANTITERESERVEE'];
}