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
       'styleSheets' => ['listeproposition.css'],
       'title' => 'Modification catégorie',
       'component' => 'backoffice/statistique-user',
       'site' => 'admin',
     );
    $this->load->view('templates/body', $data);
  }

  public function modele($id) {
			$this->load->model("Objet_model","Objetmodel");
			$this->Objetmodel->getDetailsBy($id);
			
	}

  public function total() {

  //   $this->load->model("Client_model","clientmodel");
  //   return var_dump($this->clientmodel->getTotalInscrit());
  // }

    public function test() {
      echo date('Y-m-d H:i:s');
    }

}


/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
