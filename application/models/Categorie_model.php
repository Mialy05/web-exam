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
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function update($id, $nom) {
    $this->db->where('idcategorie', $id);
    $query = $this->db->update('category', array('nom' => $nom));
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

  public function delete($id) {
    $this->db->where('idcategorie', $id);
    $query = $this->db->delete('category');
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    return FALSE;
  }

}  