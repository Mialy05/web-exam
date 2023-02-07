<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Category
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CONTROLLERSESSION
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */
require_once APPPATH.'controllers/ControllerSession.php'; 

class Admin extends ControllerSession {
    
  public function __construct() {
    parent::__construct();
    $this->load->model("Categorie_model", "categorieModel" , true);
  }

  public function index() {
    //redirect("/home");
  }

  public function listeCategories() {
    $data["categories"] = $this->categorieModel->getAll();
    $this->load->view("templates/body", $data);
  }

}