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

// require_once APPPATH.'controllers/Basecontroller.php';

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
      'styleSheets' => ['login.css'],
      'title' => 'APP | title provisoire',
      'component' => 'login'
    );

    $this->load->view('login', $data);
  }

  public function modele() {
   
  }

}


/* End of file Test.php */
/* Location: ./application/controllers/Test.php */
