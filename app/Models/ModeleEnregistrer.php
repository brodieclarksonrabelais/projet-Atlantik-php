<?php
namespace App\Models;
use CodeIgniter\Model;
 
class ModeleEnregistrer extends Model
{
    protected $table = 'enregistrer e'; 
    protected $returnType = 'object'; 
    protected $allowedFields = ['NORESERVATION', 'LETTRECATEGORIE', 'NOTYPE', 'QUANTITERESERVEE', 'QUANTITEEMBARQUEE'];

    public function getUneReservation($noreservation)
        {
            return $this->join('reservation r', 'e.noreservation = r.noreservation', 'inner')
            ->join('type ty', 'e.lettrecategorie = ty.lettrecategorie and e.notype = ty.notype',  'inner')
            ->select('ty.LIBELLE, QUANTITERESERVEE')
            ->where('e.noreservation', $noreservation)
            ->get()
            ->getResult();
        }
}

    