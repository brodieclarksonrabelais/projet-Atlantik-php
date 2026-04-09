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
    
}