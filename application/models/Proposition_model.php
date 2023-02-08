<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Proposition_model
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

class Proposition_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Objet_model', 'objetModel');
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function getPropositionEnAttenteOf($user) {
    $condition = [
      'idreceiver' => $user,
      'statut' => 0
    ];
    $query = $this->db->get_where('detailsproposition', $condition);
    return $query->result();
  }

  public function getById($id) {
    $query = $this->db->get_where('proposition', array('idproposition'=> $id));

    if(count($query->result()) == 0) {
      return null;
    }
    return $query->result()[0];
  }

  public function proposer($idsender, $idobjetsender, $idreceiver, $idobjetreceiver) {
    $data = array (
      'idproposition' => '',
      'idsender' => $idsender,
      'idobjetsender' => $idobjetsender,
      'idreceiver' => $idreceiver,
      'idobjetreceiver' => $idobjetreceiver,
      'jour' => date('Y-m-d H:i:s'),
      'statut' => 0
    );

    $this->db->insert('proposition', $data);
  }

  public function accepter($idproposition) {
    $proposition = $this->getById($idproposition);
    var_dump($proposition);
    if($proposition == null) {
      return FALSE;
    }
    else {
      $jour = date('Y-m-d H:i:s');
      $this->updateStatus($proposition->idproposition, 5);
      $this->objetModel->insertHistorique($proposition->idobjetreceiver, $proposition->idsender, $jour);
      $this->objetModel->insertHistorique($proposition->idobjetsender, $proposition->idreceiver, $jour);
      $this->objetModel->updateProprietaire($proposition->idobjetsender, $proposition->idreceiver);
      $this->objetModel->updateProprietaire($proposition->idobjetreceiver, $proposition->idsender);
    }
  }

  public function refuser($idproposition) {
    $this->updateStatus($idproposition, -5);
  }

  public function updateStatus($id, $status) {
    $this->db->where('idproposition', $id);
    $query = $this->db->update('proposition', array('statut' => $status));
  }



  // public function insertHistorique($)

  // ------------------------------------------------------------------------

}

/* End of file Proposition_model.php */
/* Location: ./application/models/Proposition_model.php */