<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Inscription
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Inscription extends CI_Controller
{
  private $errorMessage;

  public function __construct()
  {
    parent::__construct();
    $this->errorMessage = array (
      "required" => 'Vous devez remplir le champ %s.',
      "min_length" => 'Le %s doit contenir au moins %s caractères.'
    );
  }

  public function index() {
    $data = array (
      'styleSheets' => array('login.css'),
      'title' => 'Inscription',
      'component' => 'inscription',
    );
    $this->load->view('inscription.php');
  }

  public function inscription() {
  // form validation  
    $this->form_validation->set_rules(
      "nom", "Nom", 
      "required", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "prenom", "Prénom", 
      "required", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "email", "Email", 
      "required|valid_email", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "password", "Mot de passe", 
      "required|min_length[]", 
      $this->errorMessage
    );
    if($this->form_validation->run() == FALSE) {
      $this->index();
    }
    else {
      
    }
  }

}


/* End of file Inscription.php */
/* Location: ./application/controllers/Inscription.php */