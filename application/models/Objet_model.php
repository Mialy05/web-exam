<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Objet_model
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

class Objet_model extends CI_Model {

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
    $query = $this->db->get("objet");
    return $query->result();
  }

  public function getCondition($condition) {
    $query = $this->db->get_where("objet", $condition);
    return $query->result();
  }

	public function  getDetailsBy($id) {
    $query = $this->db->get_where("detailobjet",array("idobjet" => $id));
		$reponse = $query->result();
    if(count($reponse) == 0) {
      return null;
    }
    else {
      return $reponse[0];
		}
	}

	public function getPhotos($id) {
		$query = $this->db->get_where("photoobjet",array("idobjet" => $id));
		$reponse = $query->result();
    if(count($reponse) == 0) {
      return null;
    }
    else {
      return $reponse[0];
	}
  // ------------------------------------------------------------------------

}

/* End of file Objet_model.php */
/* Location: ./application/models/Objet_model.php */
