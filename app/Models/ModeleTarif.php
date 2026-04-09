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

    /*public function getAllTarif($noliaison)
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
    }*/
        public function getcategorie()
        {
            return $this->select('c.LETTRECATEGORIE, c.libelle')
                        ->from('categorie c')
                        ->groupby('c.LETTRECATEGORIE, c.libelle')
                        ->get()
                        ->getResult();
        }
        
        public function getype() {
            return $this->select('ty.NOTYPE, ty.LETTRECATEGORIE, ty.libelle')
                    ->from('type ty')
                    ->groupby('ty.NOTYPE, ty.LETTRECATEGORIE, ty.libelle')
                    ->get()
                    ->getResult();
        }
        
        public function getperiode(){
            return $this->select('p.NOPERIODE, p.DATEDEBUT, p.DATEFIN')
                ->from('periode p')
                    ->groupby('p.NOPERIODE, p.DATEDEBUT, p.DATEFIN')
                    ->get()
                    ->getResult();
        }
        
        public function getAllTarifs($noliaison)
        {
            return $this->select('TARIF, NOPERIODE, NOTYPE, LETTRECATEGORIE')
                ->where('NOLIAISON', $noliaison)
                ->get()
                ->getResult();
        }
        
        public function getnomport($noliaison)
        {
            return $this->select('p.NOM as portDepart, po.NOM as portArrivee')
                ->from('liaison l')
                ->join('port p', 'p.NOPORT = l.NOPORT_DEPART')
                ->join('port po', 'po.NOPORT = l.NOPORT_ARRIVEE')
                ->where('l.NOLIAISON', $noliaison)
                ->get()
                ->getResult();
        }
    
}

