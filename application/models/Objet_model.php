<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Objet_model
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

class Objet_model extends CI_Model {

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

  public function getAll() {
    $query = $this->db->get("objet");
    return $query->result();
  }

  public function getCondition($condition) {
    $query = $this->db->get_where("objet", $condition);
    return $query->result();
  }

  public function getOthersObjetOf($iduser) {
    $condition = array('idproprietaire !=' => $iduser);
    return $this->objetModel->getCondition($condition);
  }

  public function getObjetOf($iduser) {
    $condition = array('idproprietaire =' => $iduser);
    return $this->objetModel->getCondition($condition);
  }

  // public function create($title, $description, $prix, $proprietaire, $photos) {
  //   $data = array (
  //     'idobjet' => '',
  //     'idproprietaire' => $proprietaire,
  //     'titre' => $title,
  //     'description' => $description,
  //     'prix' => $prix
  //   );

  // $this->db->insert('objet', $data);
  //   $id = $this->db->insert_id('objet');
   
  //   if($this->db->affected_rows() == 1) {
  //     //  for($i = 0; $i<count($photos); $i++) {
  //     //     $data =  array('idphoto' => '', 'idobjet' => $id, 'photo' => $photos['file_name']);
  //     //     if($i == 0) {
  //     //       $data[] = array('type' => 0);
  //     //     }
  //     //     else {
  //     //       $data[] = array('type' => 1);
  //     //     }
  //     //     var_dump($data);
  //     //     // $res = $this->db->insert('photoobjet', $data);
  //     //  }
  //      $count = count($photos['name']);
    
  //   for($i=0;$i<$count;$i++){
  
  //     if(!empty($_FILES['photos']['name'][$i])){
  //       $_FILES['file']['name'] = $photos['name'][$i];
  //       $_FILES['file']['type'] = $photos['type'][$i];
  //       $_FILES['file']['tmp_name'] = $photos['tmp_name'][$i];
  //       $_FILES['file']['error'] = $photos['error'][$i];
  //       $_FILES['file']['size'] = $photos['size'][$i];

  //       $config['upload_path'] = './assets/image'; 
  //       $config['allowed_types'] = 'jpg|jpeg|png|gif';
  //       $config['max_size'] = '5000';
  //       $config['file_name'] = 'user'.$this->session->userdata('user').'_img'.$i;

  //       $this->load->library('upload',$config); 
  
  //       $uploadData = null;
  //       if($this->upload->do_upload('file')){
  //         $uploadData = $this->upload->data();
  //       }
  //     }

  //   }
  //   }
  //   // return FALSE;
  //   // echo $id;
  // }


}

/* End of file Objet_model.php */
/* Location: ./application/models/Objet_model.php */