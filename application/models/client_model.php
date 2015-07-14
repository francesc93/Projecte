<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class client_model extends CI_Model  {
  public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    
    public function getActualitat() {
    $this->db->select('id_blog, titol, comentari, foto');
    $query = $this->db->get('ACTUALITAT');
    return $query->result_array();
  }

    public function getActualitat_llegir_mes($id) {
    $this->db->select('id_blog, titol, comentari, foto');
    $this->db->where('id_blog', $id);    
    $query = $this->db->get('ACTUALITAT');
    return $query->result_array();
  }
  public function getGaleria() {
    $this->db->select('a.NOM, b.URL, b.ID_FOTO, b.ID_GALERIA');
    $this->db->group_by("b.ID_GALERIA");
    $this->db->from('GALERIES a, FOTOS b'); 

    $query = $this->db->get();
    return $query->result_array();
  }
 public function galeria_fotos($id) {
   $this->db->select('ID_FOTO, URL, ID_GALERIA');
    $this->db->where('ID_GALERIA', $id);    
    $query = $this->db->get('FOTOS');
    return $query->result_array();
  }

  
 public function registra_usuari($contrasenya, $nom, $cognoms, $foto , $data_naixement, $rol, $estat, $categoria, $sexe, $email) {
    $data = array(
      'contrasenya' => $contrasenya,
      'nom' => $nom,
      'cognoms' => $cognoms,
      'foto' => $foto,
      'data_naixement' => $data_naixement,
      'rol' => $rol,
      'estat' => $estat,
      'categoria' => $categoria,
      'sexe' => $sexe,
      'email' => $email
    );
    $this->db->insert('VALIDAR_USUARIS', $data);
  }
    public function usuario_por_nombre_contrasena($email, $contrasenya){
    $this->db->select('ID_USUARI,EMAIL, NOM, CONTRASENYA,EMAIL, COGNOMS,FOTO, DATA_NAIXEMENT, ROL, ID_ESTAT, ID_CATEGORIA');
    $query = $this->db->from('USUARIS');
    $where = array('EMAIL ' => $email , 'CONTRASENYA ' => $contrasenya);
    $this->db->where($where);
    $consulta = $this->db->get();
    $resultado = $consulta->row();
    return $resultado;
  }

}
