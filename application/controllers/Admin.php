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

class Admin extends CI_Controller {
    
  public function __construct() {
    parent::__construct();
    $this->load->model("Categorie_model", "categorieModel" , true);
  }

  public function index() {
    // $data = array(
    //   'styleSheets' => [],
    //   'title' => 'Admin | Les catégories',
    //   'component' => 'backoffice/home',
    //   'site' => 'admin'
    // );

    // $this->load->view('templates/body', $data);
    $this->listeCategories();
  }

  public function listeCategories() {
    $data["categories"] = $this->categorieModel->getAll();
		$data = array(
      'styleSheets' => ['admin-category.css', 'navbar.css'],
      'title' => 'Les catégories',
      'component' => 'backoffice/liste-categorie',
      'site' => 'admin',
			'categories' => $this->categorieModel->getAll()
    );
    $this->load->view("templates/body", $data);
  }

}
