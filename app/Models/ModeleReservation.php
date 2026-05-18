<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleReservation extends Model
{
    protected $table = 'reservation r';
    protected $primaryKey = 'noreservation';
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['notraversee', 'noclient', 'dateheure', 'montanttotal', 'paye', 'modereglement'];

    public function getAllReservation($noclient)
    {
        return $this->join('client c', 'r.noclient = c.noclient',  'inner')
        ->join('traversee trav', 'r.notraversee = trav.notraversee',  'inner')
        ->join('liaison l', 'trav.noliaison = l.noliaison',  'inner')
        ->join('port pd', 'l.noport_depart = pd.noport',  'inner')
        ->join('port pa', 'l.noport_arrivee = pa.noport',  'inner')
        ->select('noreservation, DATE(dateheure) as datereservation, montanttotal, paye')
        ->select('dateheuredepart')
        ->select('pd.NOM as portDepart, pa.NOM as portArrivee')
        ->where('c.noclient', $noclient)
        ->get()
        ->getResult();
    }
}

