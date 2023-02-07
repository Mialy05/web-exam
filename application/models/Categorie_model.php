<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Category_model
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

class Categorie_model extends CI_Model {
  public $name;
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

  public function getAll() {
    $query = $this->db->get("categorie");
    return $query->result();
  }

}  