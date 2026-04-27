<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleTraversee extends Model
{
    protected $table = 'traversee trav';
    protected $primaryKey = 'notraversee'; 
    protected $useAutoIncrement = true;
    protected $returnType = 'object'; 
    protected $allowedFields = ['noliaison', 'nobateau', 'dateheuredepart', 'dateheurearrivee'];

    public function getAllTraversee($noliaison, $dateheuredepart)
    {
        return $this->join('bateau b', 't.nobateau = b.nobateau','inner')
        ->select('notraversee, nom, dateheuredepart')
        ->where($noliaison, 'noliaison')
        ->where(DATE($dateheuredepart), 'DATE(dateheuredepart)')
        ->get()
        ->getResult();
    }

    public function getCapaciteMax($notraversee, $lettrecategorie)
    {
        return $this->join('bateau b', 'b.nobateau = t.nobateau',  'inner')
        ->join('contenir c', 'b.nobateau = c.nobateau', 'inner')
        ->select('capacitemax')
        ->where('notraversee', $notraversee)
        ->where('lettrecategorie', $lettrecategorie)
        ->get()
        ->getResult();
    }

    public function getQuantiteEnregistre($notraversee, $lettrecategorie)
    {
        return $this->join('reservation r', 'r.notraversee = t.notraversee',  'inner')
        ->join('enregistrer e', 'e.noreservation = r.noreservation', 'inner')
        ->select('sum(quantitereservee)')
        ->where('notraversee', $notraversee)
        ->where('lettrecategorie', $lettrecategorie)
        ->get()
        ->getResult();
    }

    /*public function getLiaisonsParSecteur($nosecteur)
    {
        return $this->join('liaison l', 'l.noliaison = trav.noliaison', 'inner')
        ->join('secteur s', 'l.nosecteur = s.nosecteur', 'inner')
        ->join('port pd', 'l.NOPORT_DEPART = pd.NOPORT',  'inner')
        ->join('port pa', 'l.NOPORT_ARRIVEE = pa.NOPORT',  'inner')
        ->select('l.noliaison, pd.NOM as portDepart, pa.NOM as portArrivee, s.NOM as nomsecteur, NOPORT_DEPART, NOPORT_ARRIVEE, DISTANCE, s.NOSECTEUR')
        ->where('l.nosecteur', $nosecteur)
        ->get()
        ->getResult();
    }*/

    public function getAllSecteur()
    {
        return  $this->select('s.nosecteur, s.nom')
        ->from('secteur s')
        ->groupby('s.nosecteur')
        ->get()
        ->getResult();
    }

    public function getDatesDepart($noliaison)
    {
        return $this->select('dateheuredepart')
        ->where('noliaison', $noliaison)
        ->get()
        ->getResult();
    }
    
}