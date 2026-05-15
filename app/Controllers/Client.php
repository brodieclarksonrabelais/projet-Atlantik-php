<?php
namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleLiaison;
use App\Models\ModeleTarif;
use App\Models\ModeleTraversee;
use App\Models\ModeleCategorie;
use App\Models\ModeleEnregistrer;
use App\Models\ModeleReservation;
helper(['url', 'assets', 'form']);
 
class Client extends BaseController
{

    public function reservationTraversee($notraversee)
    {
        $session = session();

        $modTraversee = new ModeleTraversee();
        $data['UneLiaisonPourTraversee'] = $modTraversee->getUneLiaisonPourUneTraversee($notraversee);
        $data['LaTraversee'] = $modTraversee->where(['notraversee' => $notraversee])->first();


        if(isset($_SESSION['noclient']))
        {
            $modClient = new ModeleClient();
            $data['InfosClient'] = $modClient->where(['NOCLIENT' => $_SESSION['noclient']])->first();
        }
        
        $noliaison = $_SESSION['noliaison'];
        $datedepart = $_SESSION['dateDepart'];

        $modTarif = new ModeleTarif();
        $data['LesTarifsParType'] = $modTarif->getAllTypeEtTarif($noliaison, $datedepart);

        $data['TitreDeLaPage'] = 'Réserver une traversée';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Client/vue_ReservationTraversee', $data)
            . view('Templates/Footer');
        }
        

        if ($this->request->is('post')) {
                    $MontantTotal = 0;
                    foreach ($this->request->getPost('LesTarifsParType') as $ligne) {
                        if ($ligne['quantite'] != "") 
                        {
                            $tarif = (float) $ligne['tarif'];
                            $quantite   = (float) $ligne['quantite'];
                            $MontantTotal += $tarif * $quantite;
                        }
                    }
                    $donneesReservation = [
                        'NOTRAVERSEE'=> (int) $notraversee,
                        'NOCLIENT' => (int) $session->get('noclient'),
                        'DATEHEURE' => date('Y-m-d H:i:s'),
                        'MONTANTTOTAL'=> (float) $MontantTotal,
                        'PAYE'=> 0,
                        'MODEREGLEMENT'=> null,
                    ];
                    $modReservation = new modeleReservation();
                    $modReservation->insert($donneesReservation, false);


                   $noReservation = $modReservation->getInsertID(); 
                    foreach ($this->request->getPost('libelle') as $ligne) {
                        if ($ligne['quantite'] != "") { 
                            $donneesEnregistrer = [
                                'NORESERVATION' => (int) $noreservation,
                                'LETTRECATEGORIE' => $ligne['lettrecategorie'],
                                'NOTYPE'  => (int) $ligne['notype'],
                                'QUANTITERESERVEE'  => (int) $ligne['quantite'],
                                'QUANTITEEMBARQUEE' => 0,
                            ];
                            $modEnregistrer = new ModeleEnregistrer;
                            $modEnregistrer->insert($donneesEnregistrer, false);
                        }
                    }
                }
        
        return view('Templates/Header')
        . view('Visiteur/vue_ReservationTraversee', $data)
        . view('Templates/Footer');
    }

    public function modifierClient()
    {
        $session = session();

        $data['TitreDeLaPage'] = 'Modifer vos informations';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Client/vue_ModifierUnCompte', $data)
            . view('Templates/Footer');
        }
        $reglesValidation = [
            'txtNom' => 'required|string|max_length[60]',
            'txtPrenom' => 'required|string|max_length[60]',
            'txtAdresse' => 'required|string|max_length[128]',
            'txtCodepostal' => 'required|integer|max_length[11]',
            'txtVille' => 'required|string|max_length[80]',
            'txtTelfixe' => 'required|string|max_length[16]',
            'txtTelportable' => 'required|string|max_length[16]',
            'txtMel' => 'required|string|max_length[80]',
            'txtMotDePasse' => 'required|string|min_length[2]',
        ];
        if (!$this->validate($reglesValidation)) {

            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header')
            . view('Client/vue_ModifierUnCompte', $data)
            . view('Templates/Footer');
        }

        $donneesAModifier = array(
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodepostal'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtTelfixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtTelportable'),
            'MEL' => $this->request->getPost('txtMel'),
            'MOTDEPASSE' => $this->request->getPost('txtMotDePasse'),
        ); 
        $modClient = new ModeleClient();
        $condition = ['NOCLIENT'=>$session->get('noclient')];
        $donnees['clientAModifier'] = $modClient->where('NOCLIENT', $condition)->update($condition,$donneesAModifier, false);

        return view('Templates/Header')
            .view('Client/vue_RapportModifierClient', $donnees)
            .view('Templates/Footer');
    }

    public function reservationsPourUnClient($mel)
    {
        $data['TitreDeLaPage'] = 'Historique des reservations';
        
        $modClient = new ModeleClient();
        $donnees['noClient'] = $modClient->where($mel, 'MEL');

        $pager = \Config\Services::pager();
        $modelReservation = new ModeleReservation(); //instanciation du modèle
        $data['lesReservations'] = $modelReservation->paginate(3); // Récupération des données via le modèle
        $data['pager'] = $modelReservation->pager;
     
        return view('Templates/Header') //envoi du header
        .view('Client/vue_HistoriqueReservation', $data)
        .view('Templates/Footer'); //envoi du footer
    }
}