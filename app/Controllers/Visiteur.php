<?php
namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleLiaison;
use App\Models\ModeleTarif;
helper(['url', 'assets', 'form']);

class Visiteur extends BaseController
{
    public function accueil()
    {
        return view('Templates/Header')
        . view('Visiteur/vue_Accueil')
        . view('Templates/Footer');
    }

    public function seConnecter()
    {
        helper(['form']);
        $session = session();
 
        $data['TitreDeLaPage'] = 'Se connecter';

        if (!$this->request->is('post')) {
            return view('Templates/Header', $data) 
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }

        $reglesValidation = [
            'txtMel' => 'required',
            'txtMDPConnect' => 'required',
        ];
        if (!$this->validate($reglesValidation)) {
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }

        $Mel = $this->request->getPost('txtMel');
        $MdP = $this->request->getPost('txtMDPConnect');

        $modClient = new ModeleClient();
        $condition = ['mel'=>$Mel,'motdepasse'=>$MdP];
        $clientRetourne = $modClient->where($condition)->first();
 
        if ($clientRetourne != null) {
            $session->set('mel', $clientRetourne->MEL, 'noclient', $clientRetourne->noclient);
            $data['Mel'] = $Mel;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_ConnexionReussie');
        } else {
            $data['TitreDeLaPage'] = "Adresse mel ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
    } 

     public function seDeconnecter()
    {
        session()->destroy();
        return redirect()->to('seconnecter');
    } 

    public function ajouterClient()
    {
        $data['TitreDeLaPage'] = 'Ajouter un client';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Visiteur/vue_CreerUnCompte', $data)
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
            . view('Visiteur/vue_CreerUnCompte', $data)
            . view('Templates/Footer');
        }

        $donneesAInserer = array(
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
        $donnees['clientAjoute'] = $modClient->insert($donneesAInserer, false);

        return view('Templates/Header')
            .view('Visiteur/vue_RapportAjouterClient', $donnees)
            .view('Templates/Footer');
    }

    public function liaisonParSecteur()
    {
        $modLiaison = new ModeleLiaison();
        $donnees['lesLiaisons'] = $modLiaison->getAllLiaison();
        $donnees['TitreDeLaPage'] = "Liste des liaisons";
        return view('Templates/Header')
        . view('Visiteur/vue_LiaisonParSecteurs', $donnees)
        . view('Templates/Footer');
    }

    public function tarifsParLiaison($noliaison)
    {
        $modTarif = new ModeleTarif();
            $data['noliaison']  = $noliaison;
            $data['categories'] = $modTarif->getcategorie();
            $data['types']      = $modTarif->getype();
            $data['periodes']   = $modTarif->getperiode();
            $data['tarifs']     = $modTarif->getAllTarifs($noliaison);
            $data['nomsports']  = $modTarif->getnomport($noliaison);
            $data['TitreDeLaPage'] = 'Tarifs de la liaison ' . $noliaison;
            /*$donnees['TitreDeLaPage'] = "Liaison " .$donnees['lesTarifs']-> numliaison. " : " .$donnees['lesTarifs']-> portDepart. " - " .$donnees['lesTarifs']-> portArrivee;*/
        
        return view('Templates/Header')
        . view('Visiteur/vue_TarifsParLiaison', $data)
        . view('Templates/Footer');
    }

    public function horairesTraversee()
    {
        $modTraversee = new ModeleTraversee();
        $data['LesSecteurs'] = $modTraversee->getAllSecteur();
        $data['LesLiaisonsParSecteur'] = $modTraversee->getLiaisonsParSeceteur($nosecteur);
        $data['Traversees'] = $modTraversee->getAllTraversee($noliaison, $dateheuredepart);
        $data['CapaciteMax'] = $modTraversee->getCapaciteMax($notraversee, $lettrecategorie);
        $data['QuantiteEnregistre']  = $modTraversee->getQuantiteEnregistre($notraversee, $lettrecategorie);
        $data['PlacesDispo'] = $data['CapaciteMax'] - $data['QuantiteEnregistre'];

        $modTarif = new ModeleTarif();
        $data['categories'] = $modTarif->getcategorie();

        return view('Templates/Header')
        . view('Visiteur/vue_HorairesTraversee', $data)
        . view('Templates/Footer');
    }

}