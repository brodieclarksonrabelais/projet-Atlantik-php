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

    public function getAllTarif($noliaison)
    {
        return $this->join('categorie cat', 'tar.lettrecategorie = cat.lettrecategorie', 'inner')
        ->join('type ty', 'tar.lettrecategorie = ty.lettrecategorie and tar.notype = ty.notype',  'inner')
        ->join('periode p', 'tar.noperiode = p.noperiode',  'inner')
        ->join('liaison l', 'tar.noliaison = l.noliaison',  'inner')
        ->join('port pd', 'l.noport_depart = pd.noport',  'inner')
        ->join('port pa', 'l.noport_arrivee = pa.noport',  'inner')
        ->select('cat.lettrecategorie as unecategorie, cat.libelle as nomcategorie')
        ->select('ty.lettrecategorie as lettretype, ty.notype as numtype, ty.libelle as nomtype')
        ->select('datedebut, datefin')
        ->select('pd.NOM as portDepart, pa.NOM as portArrivee')
        ->select('tar.noliaison as numliaison')
        ->select('tarif')
        ->where('tar.noliaison', $noliaison)
        ->get()
        ->getResult();
    }
}

