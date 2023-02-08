<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Objet_controller
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

require_once APPPATH.'controllers/Basecontroller.php'; 

class Objet extends Basecontroller
{
  private $errorMessage;    
  public function __construct()
  {
    parent::__construct();
	$this->load->model("Objet_model","Objetmodel", true);
	$this->errorMessage = array (
		"required" => 'Veuillez remplir le champ %s.',
		"greater_than" => 'Le champ %s doit être supérieur à %s'
	);
  }

  public function index() {
   
  }

	public function details($id) {
		$data = array(
			'styleSheets' => ['frontoffice/details-objet.css'], 
			'title' => 'Détails', 
			'site' => 'user', 
			'component' => 'frontoffice/details-objet' ,
			'categorie'=> $this->Objetmodel-> getDetailsBy($id),
			'photos'=> $this->Objetmodel->getPhotos($id),
			'myobjects' => $this->Objetmodel->getObjetOf($this->session->user),
			"form" => true
		);

		$this->load->view('templates/body', $data);
	}

	public function myobjets() {
		$objets = $this->Objetmodel->getDetailObjetOf($this->session->user);
		$data = array (
		  'styleSheets' => ['frontoffice/home.css'],
		  'title' => 'Gestion d\'objets',
		  'component' => 'frontoffice/my-objet',
		  'site' => 'user',
		  'objets' => $objets
		);
		$this->load->view('templates/body', $data);
	  }
	
	  // Afindra any am objet
	  public function nouveau() {
		$this->load->model('Categorie_model', 'categorieModel', true);
		$categories = $this->categorieModel->getAll();
		$data = array (
		  'styleSheets' => ['form.css', 'frontoffice/create-objet.css'],
		  'title' => 'Ajouter objet',
		  'component' => 'frontoffice/create-objet',
		  'site' => 'user',
		  'categories' => $categories
		);
	
		$this->load->view('templates/body', $data);
	  }
	
	  public function creation() {
	
		$this->form_validation->set_rules(
		  "nom", "Nom", 
		  "required", 
		  $this->errorMessage 
		);
		$this->form_validation->set_rules(
		  "prix", "Prix estimatif", 
		  "required|greater_than[0]", 
		  $this->errorMessage 
		);
		
		if($this->form_validation->run() == FALSE) {
		  $this->nouveau();
		}
		else {
		  $title = $this->input->post('nom');
		  $description = $this->input->post('description');
		  $prix = $this->input->post('prix');
		  $photo = $_FILES['photo1'];
		  $photos = $_FILES['photos[]'];
		  $categories = $this->input->post('categorie[]');
		  var_dump($categories);
	
		  $this->Objetmodel->create($title, $description, $prix, $this->session->user, $photo, $photos, $categories);
		  
		  redirect('objet/myobjets');
		}
	
	  }

	public function updateProprietaire($idobjet, $idprorietaire) {
		$this->db->where('idobjet', $idobjet);
		$query = $this->db->update('objet', array('idproprietaire' => $idprorietaire));
		if($this->db->affected_rows() == 1) {
			return TRUE;
		}
		show_error('Erreur lors de l\'insertion.', 500, 'Oups une erreur s\'est produite');
	}
}


/* End of file Objet_controller.php */
/* Location: ./application/controllers/Objet_controller.php */
