<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleClient extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'noclient'; 
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['NOM', 'PRENOM', 'ADRESSE', 'CODEPOSTAL', 'VILLE', 'TELEPHONEFIXE', 'TELEPHONEMOBILE', 'MEL', 'MOTDEPASSE'];
}