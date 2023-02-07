<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller BaseController
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

class Basecontroller extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    if(!$this->session->has_userdata('name')) {
      echo 'tsisy session oh<br>';
      // redirect('test/modele');
    }
  }

  public function index()
  {
    // 
  }

}


/* End of file BaseController.php */
/* Location: ./application/controllers/BaseController.php */