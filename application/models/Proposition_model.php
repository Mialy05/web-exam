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
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function getById($id) {
    $this->db->where('idproposition', $id);
    $query = $this->db->get('proposition');
    if(count($query) != 0) {
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
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    show_error('Erreur lors de l\'insertion.', 500, 'Oups une erreur s\'est produite');
  }

  public function accepter($idproposition) {
    $proposition = $this->getById($idproposition);
    if($proposition == null) {
      return FALSE;
    }
    else {
      $jour = date('Y-m-d H:i:s');
      $this->updateStatus($proposition->idproposition);
      $this->objetModel->insertHistorique($proposition->idobjetreceiver, $proposition->sender, $jour);
      $this->objetModel->insertHistorique($proposition->idobjetsender, $proposition->receiver, $jour);
      $this->objetModel->updateProprietaire($idobjetsender, $idreceiver);
      $this->objetModel->updateProprietaire($idobjetreceiver, $idsender);
    }
  }

  public function refuser($idproposition) {
    $this->updateStatus($idproposition, -5);
  }

  public function supprimer($idproposition) {
    $this->updateStatus($idproposition, -1);
  }

  public function updateStatus($id, $status) {
    $this->db->where('idproposition', $id);
    $query = $this->db->update('proposition', array('status' => $status));
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    show_error('Erreur lors de l\'insertion.', 500, 'Oups une erreur s\'est produite');
  }



  // public function insertHistorique($)

  // ------------------------------------------------------------------------

}

/* End of file Proposition_model.php */
/* Location: ./application/models/Proposition_model.php */