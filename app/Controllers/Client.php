<?php
namespace App\Controllers;
use App\Models\ModeleClient;
helper(['url', 'assets', 'form']);
 
class Client extends BaseController
{
    public function modifierClient()
    {
        $session = session();
        $noclient = $session->get('noclient');


        $data['TitreDeLaPage'] = 'Modifer vos informations';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Client/vue_ModifierUnCompte', $data)
            . view('Templates/Footer');
        }
        $reglesValidation = [
            'txtNom' => 'permit_empty|string|max_length[60]',
            'txtPrenom' => 'permit_empty|string|max_length[60]',
            'txtAdresse' => 'permit_empty|string|max_length[128]',
            'txtCodepostal' => 'permit_empty|integer|max_length[11]',
            'txtVille' => 'permit_empty|string|max_length[80]',
            'txtTelfixe' => 'permit_empty|string|max_length[16]',
            'txtTelportable' => 'permit_empty|string|max_length[16]',
            'txtMel' => 'permit_empty|string|max_length[80]',
            'txtMotDePasse' => 'permit_empty|string|min_length[2]',
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
        $donnees['clientAModifier'] = $modClient->where('NOCLIENT', $noclient)->update($noclient,$donneesAModifier, false);

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
        $data['lesReservations'] = $modelReservation->paginate(4); // Récupération des données via le modèle
        $data['pager'] = $modelReservation->pager;
     
        return view('Templates/Header') //envoi du header
        .view('Client/vue_HistoriqueReservation', $data)
        .view('Templates/Footer'); //envoi du footer
    }
}