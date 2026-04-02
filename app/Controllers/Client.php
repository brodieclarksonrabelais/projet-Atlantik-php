<?php
namespace App\Controllers;
helper(['url', 'assets', 'form']);
 
class Client extends BaseController
{
    public function modifierClient()
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
        $donnees['clientAjoute'] = $modClient->update($donneesAInserer, false);

        return view('Templates/Header')
            .view('Visiteur/vue_RapportAjouterClient', $donnees)
            .view('Templates/Footer');
    }
}