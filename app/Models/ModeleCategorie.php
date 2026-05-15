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
        return $this->select('ty.NOTYPE, ty.LETTRECATEGORIE, ty.LIBELLE')
        ->from('type ty')
        ->groupby('ty.NOTYPE, ty.LETTRECATEGORIE, ty.LIBELLE')
        ->get()
        ->getResult();
    }

}

