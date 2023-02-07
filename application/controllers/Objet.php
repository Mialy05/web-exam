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
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model("Objet_model","Objetmodel");
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
}


/* End of file Objet_controller.php */
/* Location: ./application/controllers/Objet_controller.php */
