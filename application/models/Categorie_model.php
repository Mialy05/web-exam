<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model categorie_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @categorie	Model
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

  public function getBy($id) {
    $query = $this->db->get_where("categorie", array('idcategorie' => $id));
    $res = $query->result();
    if(count($res) == 0) {
      return null;
    }
    else {
      return $res[0];
    }
  }

  public function getAll() {
    $query = $this->db->get("categorie");
    return $query->result();
  }

  public function insert($data) {
    $query = $this->db->insert('categorie', $data);
  }

  public function update($id, $nom) {
    $this->db->where('idcategorie', $id);
    $query = $this->db->update('categorie', array('nom' => $nom));
  }

  public function delete($id) {
    $this->db->where('idcategorie', $id);
    $query = $this->db->delete('categorie');
  }

}  