<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleEnregistrer extends Model
{
    protected $table = 'enregistrer'; 
    protected $returnType = 'object'; 
    protected $allowedFields = ['NORESERVATION', 'LETTRECATEGORIE', 'NOTYPE', 'QUANTITERESERVEE', 'QUANTITEEMBARQUEE'];
}