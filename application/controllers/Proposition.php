<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Proposition
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

class Proposition extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		
  }

  public function index()
  {
    // 
  }
	public function listeProposition() {
    $data = array(
      'styleSheets' => ['listeproposition.css'],
      'title' => 'Mes proposition',
      'component' => 'liste-proposition'
			
    );
    $this->load->view("templates/body", $data);
  }
}


/* End of file Proposition.php */
/* Location: ./application/controllers/Proposition.php */
