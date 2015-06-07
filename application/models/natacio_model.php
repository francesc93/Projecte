<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class natacio_model extends CI_Model  {
	function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function getActualitat() {
    $this->db->select('id_blog, titol, comentari, foto');
    $query = $this->db->get('ACTUALITAT');
    return $query->result_array();
  }
  
  public function insertUsuariV($nom,$cognom, $data ,$contrasenya, $rol, $estat) {
	 $data = array(
      'nom' => $nom,
      'cognoms' => $cognom,
      'contrasenya' => $contrasenya,
      'datanaixement' => $data,
      'categoria' => $rol,
      'estat' => $estat
    );
    $this->db->insert('USUARIS_INTERNS', $data);
  
  }
    
}
