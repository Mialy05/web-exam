<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Login
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller .PHP
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Login extends CI_Controller {
    private $errorMessage;

  public function __construct()
  {
    parent::__construct();
    $this->errorMessage = array (
    "required" => 'Veuillez remplir le champ %s.'
		);
  }

  public function index()
  {
		$data = array(
      'styleSheets' => ['login.css'],
      'title' => 'Login',
      'component' => 'login'
    );
		$this->load->view('login', $data);
  }

	public function authentification() {
    $this->form_validation->set_rules(
      "email", "Email", 
      "required", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "password", "Mot de passe", 
      "required",
      $this->errorMessage
    );
    if($this->form_validation->run() == FALSE) {
       $this->index();;
			
		}
    else {
      $name = $this->input->post("email");
      $pwd = $this->input->post("password");
			
      $data = array(
        "name" => $name
      );
      if($name =="admin" && $pwd == "admin") {
          echo "mety"; 
      }
			else {
				echo "Diso";
			}
    }
	}
}	



/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
