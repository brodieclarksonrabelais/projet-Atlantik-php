<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleCategorie extends Model
{
    protected $table = 'categorie cat';
    protected $primaryKey = 'lettrecategorie'; 
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['libelle'];

    public function getype() 
    {     
        return $this->select('ty.notype, ty.lettrecategorie, ty.libelle')
        ->from('type ty')
        ->groupby('ty.notype, ty.lettrecategorie, ty.libelle')
        ->get()
        ->getResult();
    }
}

