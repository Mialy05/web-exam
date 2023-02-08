<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Category
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

class Categoryadmin extends CI_Controller {
  private $errorMessage;  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('categorie_model', 'categorieModel', true);
    $this->errorMessage = array (
      "required" => 'Veuillez remplir le champ %s.'
    );
  }

  public function index()
  {
    $this->listeCategories();
  }

  public function listeCategories() {
    $data = array(
      'styleSheets' => ['admin-category.css', 'navbar.css'],
      'title' => 'Gestion des catégories',
      'component' => 'backoffice/liste-categorie',
      'site' => 'admin',
			'categories' => $this->categorieModel->getAll()
    );
    $this->load->view("templates/body", $data);
  }

  public function creer() {
    $data = array(
      'styleSheets' => ['form.css', 'crud-categorie.css', 'navbar.css'],
      'title' => 'Admin | Nouvelle catégorie',
      'site' => 'admin',
      'component' => 'backoffice/insert-categorie'
    );
    $this->load->view("templates/body", $data);
  }

  public function creation() {
    // form-validation
    $this->form_validation->set_rules(
      "nom", "Nom de la catégorie", 
      "required",
      $this->errorMessage
    );
    if($this->form_validation->run() == FALSE) {
       $this->creer();
		}
    else {
      $form = array('nom' => $this->input->post('nom'));
      $created = $this->categorieModel->insert($form);
      redirect('categoryadmin/listecategories');
    }
  }

  public function modifier($id = '')
  {
    if($id == '') {
      redirect('categoryadmin/listecategories');
    }
    $categorie = $this->categorieModel->getBy($id);
    if($categorie == null) {
      show_error('Erreur lors de la récupération de donnée', 500, 'Oups! Une erreur de donnée s\'est produite');
    }
    
    $data = array(
      'styleSheets' => ['form.css', 'crud-categorie.css', 'navbar.css'],
      'title' => 'Modification catégorie',
      'component' => 'backoffice/update-categorie',
      'site' => 'admin',
      'category' => $categorie
    );
    
    $this->load->view('templates/body', $data);
  }

  public function update($id = '')
  {
    if($id == '') {
      redirect('categoryadmin/listecategories');
    }
    $this->form_validation->set_rules(
      "nom", "Nom de la catégorie", 
      "required",
      $this->errorMessage
    );
    if($this->form_validation->run() == FALSE) {
       $this->index();
		}
    else {
      $nom = $this->input->post('nom');
      $status = $this->categorieModel->update($id, $nom);

      redirect('categoryadmin/listecategories');

    }

  }


}


/* End of file Category.php */
/* Location: ./application/controllers/Category.php */