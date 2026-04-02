<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleTarif extends Model
{
    protected $table = 'tarifer tar';
    protected $primaryKey = 'noperiode, lettrecategorie, notype, noliaison';
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['noperiode', 'lettrecategorie', 'notype', 'noliaison', 'tarif'];

    public function getAllTarif()
    {
        return $this->join('categorie cat', 'tar.lettrecategorie = cat.lettrecategorie', 'inner')
        ->join('type ty', 'tar.lettrecategorie = ty.lettrecategorie',  'inner')
        ->join('periode p', 'tar.noperiode = p.noperiode',  'inner')
        ->select('cat.lettrecategorie as unecategorie, cat.libelle as nomcategorie')
        ->select('ty.lettrecategorie as lettretype, ty.notype as numtype, ty.libelle as nomtype')
        ->select('datedebut, datefin')
        ->select('tarif')
        ->get()
        ->getResult();
    }
}

