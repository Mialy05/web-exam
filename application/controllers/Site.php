<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Userhome
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

class Site extends Basecontroller
{
  private $errorMessage;  
  public function __construct()
  {
    parent::__construct();
    $this->load->model("Objet_model", "objetModel" , true);
  }

  public function index() {
    $this->allobjets();
  }

  public function allobjets() {
    $objets = $this->objetModel->getOthersObjetOf($this->session->user);
    $data = array (
      'styleSheets' => ['frontoffice/home.css'],
      'title' => 'Découvrir',
      'component' => 'frontoffice/home',
      'site' => 'user',
      'objets' => $objets
    );
    // $this->load->view('templates/body', $data);
    var_dump($objets);
  }

  public function myobjets() {
    $objets = $this->objetModel->getObjetOf($this->session->user);
    $data = array (
      'styleSheets' => ['frontoffice/home.css'],
      'title' => 'Gestion d\'objets',
      'component' => 'frontoffice/my-objet',
      'site' => 'user',
      'objets' => $objets
    );
    // $this->load->view('templates/body', $data);
    var_dump($objets);
  }

  // Afindra any am objet

  public function nouveau() {
    $data = array (
      'styleSheets' => ['form.css', 'frontoffice/create-objet.css'],
      'title' => 'Ajouter objet',
      'component' => 'frontoffice/create-objet',
      'site' => 'user'
    );

    $this->load->view('templates/body', $data);
  }

  public function creation() {
    $errorMessage = array (
      "required" => 'Veuillez remplir le champ %s.',
      "greater_than" => 'Le %s doit être supérieur à %s.'
      );

    $this->form_validation->set_rules(
      "nom", "Nom", 
      "required", 
      $this->errorMessage 
    );
    $this->form_validation->set_rules(
      "prix", "Prix estimatif", 
      "required|greater_than[0]", 
      $this->errorMessage 
    );
    if($this->form_validation->run() == FALSE) {
      $this->nouveau();
    }
    else {
      $title = $this->input->post('nom');
      $description = $this->input->post('description');
      $prix = $this->input->post('prix');
      $photos = $this->uploadFiles();

      var_dump($photos);

      $this->objetModel->create($title, $description, $prix, $this->session->user, $photos);
      // var_dump($this->uploadFiles());
    }

  }

  public function uploadFiles() {
    $data = array();

    $count = count($_FILES['photos']['name']);
    
    for($i=0;$i<$count;$i++){
  
      if(!empty($_FILES['photos']['name'][$i])){
        $_FILES['file']['name'] = $_FILES['photos']['name'][$i];
        $_FILES['file']['type'] = $_FILES['photos']['type'][$i];
        $_FILES['file']['tmp_name'] = $_FILES['photos']['tmp_name'][$i];
        $_FILES['file']['error'] = $_FILES['photos']['error'][$i];
        $_FILES['file']['size'] = $_FILES['photos']['size'][$i];

        $config['upload_path'] = './assets/image'; 
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = '5000';
        $config['file_name'] = $_FILES['photos']['name'][$i];
 
        $this->load->library('upload',$config); 
  
        $uploadData = null;
        if($this->upload->do_upload('file')){
          $uploadData = $this->upload->data();
        }
        $data[] = $uploadData;

        return $data;
      }
    }
  }

}


/* End of file Userhome.php */
/* Location: ./application/controllers/Userhome.php */