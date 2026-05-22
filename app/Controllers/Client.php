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
        
        $noliaison = $session->get('noliaison');
        $datedepart = $session->get('dateDepart');

        $modTarif = new ModeleTarif();
        $data['LesTarifsParType'] = $modTarif->getAllTypeEtTarif($noliaison, $datedepart);

        $data['TitreDeLaPage'] = 'Réserver une traversée';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Client/vue_ReservationTraversee', $data)
            . view('Templates/Footer');
        }
        

        if (isset($_POST['btnReservation'])) {
            if (isset($_POST['UnTarifParType'])){
                $data['MontantTotal'] = 0;
                foreach ($_POST['UnTarifParType'] as $UneLigne) {
                    if ($UneLigne['quantite'] != "") 
                    {
                        $tarif = (float) $UneLigne['tarif'];
                        $quantite   = (float) $UneLigne['quantite'];
                        $data['MontantTotal'] += $tarif * $quantite;
                    }
                    $data['ModeReglement'] = null;
                    
                    $donneesReservation = [
                        'NOTRAVERSEE'=> (int) $notraversee,
                        'NOCLIENT' => (int) $session->get('noclient'),
                        'DATEHEURE' => date('Y-m-d H:i:s'),
                        'MONTANTTOTAL'=> (float) $data['MontantTotal'],
                        'PAYE'=> 0,
                        'MODEREGLEMENT'=> $data['ModeReglement'],
                    ];
                }
                $modReservation = new modeleReservation();
                $modReservation->insert($donneesReservation, false);


                $noReservation = $modReservation->getInsertID();
                $session->set('noreservation', $noReservation);

                foreach ($_POST['UnTarifParType'] as $UneLigne) {
                    if ($UneLigne['quantite']!= "") { 
                        $donneesEnregistrer = [
                            'NORESERVATION' => (int) $noReservation,
                            'LETTRECATEGORIE' => $UneLigne['lettrecategorie'],
                            'NOTYPE'  => (int) $UneLigne['notype'],
                            'QUANTITERESERVEE'  => (int) $UneLigne['quantite'],
                            'QUANTITEEMBARQUEE' => 0,
                        ];
                        $modEnregistrer = new ModeleEnregistrer;
                        $modEnregistrer->insert($donneesEnregistrer, false);
                    }
                }
            }
            $data['LesQuantitesReserves'] = $modEnregistrer->getUneReservation($noReservation);
           

            $message = '
Bonjour Mr.'.$data['InfosClient']->NOM.',            

Nous avons le plaisir de vous informer que votre résevation pour la traversee '.$data['LaTraversee']->NOTRAVERSEE.', qui déservira la liaison '.$data['UneLiaisonPourTraversee']->portDepart.' - '.$data['UneLiaisonPourTraversee']->portArrivee.', a été validée.

Voici le montant de la facturation : '.$data['MontantTotal'].'€

Nous vous remercions pour votre confience,
Atlantik.
';

            $email = service('email');

            $email->setFrom('your@example.com', 'Your Name');
            $email->setTo($session->get('mel'));
            $email->setCC('another@another-example.com');
            $email->setBCC('them@their-example.com');

            $email->setSubject('Compte rendu de votre réservation');
            $email->setMessage($message);

            $email->send();
        }

        if ($data['LesQuantitesReserves'] != null) {
            $data['TitreDeLaPage'] = "Compte rendu de la résevation";
            echo view('Templates/Header')
            . view('Client/vue_RapportReservation', $data)
            . view('Templates/Footer');
        } else {
            $data['TitreDeLaPage'] = "Reservation impossible";
            return view('Templates/Header')
            . view('Client/vue_ReservationTraversee', $data)
            . view('Templates/Footer');
        }
    }

    public function modifierClient()
    {
        $session = session();

        $modClient = new ModeleClient();
        $data['InfosClient'] = $modClient->where(['NOCLIENT' => $_SESSION['noclient']])->first();

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

    public function reservationsPourUnClient()
    {
        $session = session();

        $data['TitreDeLaPage'] = 'Historique des reservations';
        
        $modClient = new ModeleClient();
        $noclient = $session->get('noclient');

        $pager = \Config\Services::pager();
        $modelReservation = new ModeleReservation();
        $data['lesReservations'] = $modelReservation->getAllReservation($noclient); 
        $data['pager'] = $modelReservation->pager;
     
        return view('Templates/Header')
        .view('Client/vue_HistoriqueReservation', $data)
        .view('Templates/Footer');
    }
}