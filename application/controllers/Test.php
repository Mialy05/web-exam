<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Test
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

class Test extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    // 
  }

  public function view() {
		
        $data = array(
       'styleSheets' => ['menu-statistique.css'],
       'title' => 'Statistique des echanges',
       'component' => 'backoffice/statistique-echange',
       'site' => 'admin',
     );
    $this->load->view('templates/body', $data);
  }

  public function modele($id) {
			$this->load->model("Objet_model","Objetmodel");
			$this->Objetmodel->getDetailsBy($id);
			
	}
  public function total() {

     $this->load->model("Client_model","clientmodel");
     return var_dump($this->clientmodel->getTotalInscrit());
  }

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
