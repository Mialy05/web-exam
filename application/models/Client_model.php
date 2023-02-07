<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Client_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Client_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

  // $condition = array('email' => ?, 'password' => ?)
  public function auth($condition) {
    $query = $this->db->get('utilisateur');
    $auth = $query->result();
    if($auth == null) {
      return -1;
    }
    return $auth->idutilisateur;
  }

	

}

/* End of file Client_model.php */
/* Location: ./application/models/Client_model.php */
