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
    $data = array(

    );
    $this->load->view('templates/body', $data);
  }

  public function listeCategories() {
    $data["categories"] = $this->categorieModel->getAll();
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
       $this->index();
		}
    else {
      $form = array('nom' => $this->input->post('nom'));
      $created = $this->categorieModel->insert($form);

      if($created == TRUE) {
        redirect('categoryadmin/');
      }
      show_error('Erreur lors de l\'insertion de la nouvelle catégorie', 500, 'Oups! Une erreur s\'est produite');
    }
  }

  public function modifier($id = '')
  {
    if($id == '') {
      redirect('./listeCategories');
    }
    $categorie = $this->categorieModel->getBy($id);
    if($categorie == null) {
      show_error('Erreur lors de la récupération de donnée', 500, 'Oups! Une erreur de donnée s\'est produite');
    }
    
    $data = array(
      'styleSheets' => ['form.css', 'crud-categorie.css'],
      'title' => 'Modification catégorie',
      'component' => 'backoffice/update-categorie',
      'category' => $categorie
    );
    
    $this->load->view('templates/body', $data);
  }

  public function update($id = '')
  {
    if($id == '') {
      redirect('./listeCategories');
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
      if($status == TRUE) {
        redirect('./listeCategories');
      }
      else {
        show_error('Erreur lors de la modification de la catégorie', 500, 'Oups! Une erreur s\'est produite');
      }
    }

  }

  public function supprimer($id = '')
  {
    if($id == '') {
      redirect('./listeCategories');
    }
    $categorie = $this->categorieModel->getBy($id);
    if($categorie == null) {
      show_error('Erreur lors de la récupération de donnée', 500, 'Oups! Une erreur de donnée s\'est produite');
    }
    
    $data = array(
      'styleSheets' => ['crud-categorie.css'],
      'title' => 'Modification catégorie',
      'component' => 'backoffice/delete-categorie',
      'category' => $categorie
    );
    
    $this->load->view('templates/body', $data);
  }

  public function delete($id = '')
  {
    if($id == '') {
      redirect('./listeCategories');
    }
    $categorie = $this->categorieModel->getBy($id);
    if($categorie == null) {
      show_error('Erreur lors de la récupération de donnée', 500, 'Oups! Une erreur de donnée s\'est produite');
    }
      $status = $this->categorieModel->delete($id, $nom);
      if($status == TRUE) {
        $data["categories"] = $this->categorieModel->getAll();
        $data['message'] = 'La categorie'.$categorie->nom.' a été supprimée';
        $this->load->view("templates/body", $data);
      }
      else {
        show_error('Erreur lors de la modification de la catégorie', 500, 'Oups! Une erreur s\'est produite');
      }
  }

}


/* End of file Category.php */
/* Location: ./application/controllers/Category.php */