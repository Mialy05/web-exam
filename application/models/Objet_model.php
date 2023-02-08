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
    $query = $this->db->get_where("detailobjet", $condition);
    return $query->result();
  }

  public function getDetailOthersObjetOf($iduser) {
    $condition = array('idproprietaire !=' => $iduser);
    return $this->getCondition($condition);
  }

  public function getDetailObjetOf($iduser) {
    $condition = array('idproprietaire =' => $iduser);
    return $this->getCondition($condition);
  }

  public function getObjetOf($iduser) {
    $condition = array('idproprietaire =' => $iduser);
    return $this->db->get_where('objet', $condition)->result();
  }

	public function search($idcategory,$motCle) {
		$query= $this->db->like('titre',$motCle);

		if($idcategory==0) {
			return $this->db->get('objet');
		}
		else{
			$query= $this->db->get_where('select idobjet from categorie 
			join objetcategorie as objcat on idcategorie=objcat.idcategorie',['idcategorie'=>$idcategory]);
		}
	}

  public function create($title, $description, $prix, $proprietaire, $photo1, $photos, $categories) {
    $data = array (
      'idobjet' => '',
      'idproprietaire' => $proprietaire,
      'titre' => $title,
      'description' => $description,
      'prix' => $prix
    );

    $this->db->insert('objet', $data);
    $id = $this->db->insert_id('objet');
   
    if($this->db->affected_rows() == 1) {
      foreach ($categories as $categorie) {
        $this->insertCategorie($id, $categorie);
      }
      // historique
      $this->insertHistorique($id, $proprietaire, date('Y-m-d H:i:s'));

      $status = true;
      $status = $this->uploadFiles($photo1, 1, $id);
      if($status == true) {
        foreach($photos as $photo) {
          $status = $this->uploadFiles($photo, 0, $id);
          if($status == FALSE) {
            show_error('Erreur lors de l\'insertionvet l\'upload des images.', 500, 'Oups une erreur s\'est produite');
          }
        }
      }
    
    }
      
  }

  public function uploadFiles($photo, $typephoto, $idobjet) {
		$data = array();
    echo $photo['name'];
    $_FILES['file']['name'] = $photo['name'];
    $_FILES['file']['type'] = $photo['type'];
    $_FILES['file']['tmp_name'] = $photo['tmp_name'];
    $_FILES['file']['error'] = $photo['error'];
    $_FILES['file']['size'] = $photo['size'];
    
    $config['upload_path'] = './assets/image'; 
    $config['allowed_types'] = 'jpg|jpeg|png|gif';
    $config['max_size'] = '2000000';
    $config['file_name'] = 'user_'.$this->session->user.$photo['name'];
    
        $this->load->library('upload',$config); 
      
        $uploadData = null;
        if($this->upload->do_upload('file')){
          $uploadData = $this->upload->data();
          $this->insertPhoto($idobjet, $typephoto, $config['file_name']);
          return TRUE;
        }

			return FALSE;

	}

	public function  getDetailsBy($id) {
    $query = $this->db->get_where("detailobjet",array("idobjet" => $id));
		$reponse = $query->result();
    if(count($reponse) == 0) {
      return null;
    }
    else {
      return $reponse[0];
		}
	}

	public function getPhotos($id) {
		$query = $this->db->get_where("photoobjet",array("idobjet" => $id));
		$reponse = $query->result();
    if(count($reponse) == 0) {
      return null;
    }
    else {
      return $reponse[0];
    }
	}

  public function insertPhoto($idobjet, $type, $path) {
    $data = array(
      'idphoto' => '',
      'idobjet' => $idobjet,
      'photo' => $path,
      'typephoto' => $type
    );
		// $query = $this->db->insert('photoobjet', $data, now());
    if($this->db->affected_rows() == 1) {
      return true;
    }
    else {
      echo 'insert Photo';
      var_dump($this->db->error());
      show_error('Erreur lors de l\'insertion.', 500, 'Oups une erreur s\'est produite');
    }
	}

  public function insertCategorie($idobjet, $idcategorie) {
    $data = array (
      'idobjet' => $idobjet,
      'idcategorie' => $idcategorie
    );
    
    $this->db->insert('objetcategorie', $data);
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    show_error('Erreur lors de l\'insertion.', 500, 'Oups une erreur s\'est produite');


  }

  public function insertHistorique($idobjet, $idprorietaire, $jour) {
    $data = array (
      'idhistorique' => '',
      'idobjet' => $idobjet,
      'idproprietaire' => $idprorietaire,
      'debut' => $jour  
    );

    $this->db->insert('historique', $data);
    if($this->db->affected_rows() == 1) {
      return TRUE;
    }
    show_error('Erreur lors de l\'insertion.', 500, 'Oups une erreur s\'est produite');

  }

  public function updateProprietaire($idobjet, $idprorietaire) {
		$this->db->where('idobjet', $idobjet);
		$query = $this->db->update('objet', array('idproprietaire' => $idprorietaire));
		
	}
  // ------------------------------------------------------------------------
  
}

/* End of file Objet_model.php */
/* Location: ./application/models/Objet_model.php */
