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
<<<<<<< HEAD
		$data = array(
      'styleSheets' => ['admin-category.css'],
      'title' => 'liste',
      'component' => 'liste-categorie'
=======
    $data = array(
      'styleSheets' => ['form.css', 'crud-categorie.css'],
      'title' => 'APP | title provisoire',
      'component' => 'backoffice/insert-categorie'
>>>>>>> mialisoa
    );

    $this->load->view('templates/body', $data);
  }

  public function modele() {
    // $this->session->set_userdata('name', 'Rakoto'); 
    // if($this->session->name != null) {
      // echo $this->session->name;
    // }
    // $this->session->unset_userdata('name'); 
    // if($this->session->name != null) {
      $this->load->model("Categorie_model", "c");
      var_dump( $this->c->getAll());
    }
  }




/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
