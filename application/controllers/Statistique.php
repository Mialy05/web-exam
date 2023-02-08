<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Objet_controller
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

class Statistique extends Basecontroller
{

    private $errorMessage;

    public function __construct()
    {
      parent::__construct();
      $this->load->model('client_model', 'clientModel', true);
      $this->load->model('objet_model', 'objetModel', true);
      $this->errorMessage = array ();
    }

    public function utilisateur (){

        $total = $this->clientModel->getTotalInscrit();

         $data = array(
             'styleSheets' => ['backoffice/menu-statistique.css'],
             'title' => 'Statistique utilisateur',
             'component' => 'backoffice/menu-statistique',
             'site' => 'admin',
             'total'=>$total
           );

         $this->load->view('templates/body', $data);
    }

    public function echange($statues){
      $echange = $this->objetModel->getTotalEchange(5);

      $data = array(
        'styleSheets' => ['backoffice/menu-statistique.css'],
        'title' => 'Statistique des echanges',
        'component' => 'backoffice/statistique-echange',
        'site' => 'admin',
        'total'=>$echange
      );
      $this->load->view('templates/body', $data);
    }
    
    public function stat(){
      $echange = $this->objetModel->getTotalEchange(5);
      $inscrits = $this->clientModel->getTotalInscrit();

      $data = array(
        'styleSheets' => ['backoffice/statistique.css', 'navbar.css'],
        'title' => 'Statistique',
        'component' => 'backoffice/statistique',
        'site' => 'admin',
        'echanges'=>$echange,
        'inscrits' => $inscrits
      );
      $this->load->view('templates/body', $data);
    }

}