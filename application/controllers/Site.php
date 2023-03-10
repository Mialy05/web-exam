<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Userhome
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

class Site extends Basecontroller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model("Objet_model", "objetModel" , true);
  }

  public function index() {
    $this->allobjets();
  }

  public function allobjets() {
    $objets = $this->objetModel->getDetailOthersObjetOf($this->session->user);
    $data = array (
      'styleSheets' => ['frontoffice/home.css', 'navbar.css'],
      'title' => 'Découvrir',
      'component' => 'frontoffice/home',
      'site' => 'user',
      'objets' => $objets
    );
    $this->load->view('templates/body', $data);
  }

  

}


/* End of file Userhome.php */
/* Location: ./application/controllers/Userhome.php */