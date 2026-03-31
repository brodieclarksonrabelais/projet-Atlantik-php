<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleLiaison extends Model
{
    protected $table = 'liaison l';
    protected $primaryKey = 'noliaison'; 
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['NOPORT_DEPART', 'nosecteur', 'NOPORT_ARRIVEE', 'DISTANCE'];

    public function getAllLiaison()
    {
        return $this->join('secteur s', 'l.nosecteur = s.nosecteur', 'inner')
        ->join('port pd', 'l.NOPORT_DEPART = pd.NOPORT',  'inner')
        ->join('port pa', 'l.NOPORT_ARRIVEE = pa.NOPORT',  'inner')
        ->select('noliaison, pd.NOM as portDepart, pa.NOM as portArrivee, s.NOM as nomsecteur, NOPORT_DEPART, NOPORT_ARRIVEE, DISTANCE, s.NOSECTEUR')
        ->get()
        ->getResult();
    }
}