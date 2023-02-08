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

require_once APPPATH.'controllers/Basecontroller.php'; 

class Proposition extends Basecontroller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Proposition_model', 'propositionModel');
  }

  public function index()
  {
    $this->mesAttente();
  }

  public function proposer() {
    $idsender = $this->session->user;
    $idobjetsender = $this->input->post('objetsender');
    $idreceiver = $this->input->post('idreceiver');
    $idobjetreceiver = $this->input->post('objetreceiver');
    
    $this->propositionModel->proposer($idsender, $idobjetsender, $idreceiver, $idobjetreceiver);
    redirect('objet/myobjets');
  }

	public function mesAttente() {
    $data = array(
      'styleSheets' => ['frontoffice/listeproposition.css'],
      'title' => 'Mes propositions',
      'component' => 'frontoffice/liste-proposition',
      'site' => 'user', 
      'propositions' => $this->propositionModel->getPropositionEnAttenteOf($this->session->user)
    );
    $this->load->view("templates/body", $data);
  }

  public function accepter($id) {
    $this->propositionModel->accepter($id);
    redirect('proposition/');
  }

  public function refuser($id) {
    $this->propositionModel->refuser($id);
    redirect('proposition/');
  }
}


/* End of file Proposition.php */
/* Location: ./application/controllers/Proposition.php */
