<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class actualitat_model extends CI_Model {
  function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

  public function getActualitat() {
    $this->db->select('id_blog, titol, foto, comentari');
    $query = $this->db->get('ACTUALITAT');
    return $query->result_array();
  }
    public function get_actualitat($id) {
    $this->db->select('id_blog, titol, foto, comentari');
    $this->db->where('id_blog', $id);
    $query = $this->db->get('ACTUALITAT');
    return $query->result_array();
  }
    public function getgaleria() {
    $this->db->select('NOM, URL');
    $query = $this->db->get('GALERIES');
    return $query->result_array();
  }

 public function insertar_url($titol, $url){
    $data = array(
      'TITUL' => $titol,
      'URL' => $url
    );      
     $this->db->insert('URLS', $data);
 }
   public function get_urls() {
    $this->db->select('ID_ENLLAS, TITUL, URL');
    $query = $this->db->get('URLS');
    return $query->result_array();
  }
public function getUsuaris() {
    $this->db->select('ID_USUARI, NOM, EMAIL, COGNOMS, FOTO, DATA_NAIXEMENT, ROL, ESTAT, CATEGORIA, SEXE');
    $query = $this->db->get('USUARIS_INTERNS');
    return $query->result_array();
  }
  public function getUsuaris_validar() {
    $this->db->select('ID_USUARI, NOM, EMAIL, COGNOMS, FOTO, DATA_NAIXEMENT, ROL, ESTAT, CATEGORIA, SEXE');
    $query = $this->db->get('VALIDAR_USUARIS');
    return $query->result_array();
  }
  public function validar_usuari($id) {   
    $this->db->select('CONTRASENYA, NOM, EMAIL, COGNOMS, FOTO, DATA_NAIXEMENT, ROL, ESTAT, CATEGORIA, SEXE');
    $this->db->where('ID_USUARI', $id);    
    $consulta = $this->db->get('VALIDAR_USUARIS');
    $resultado = $consulta->row();    
    $this->db->insert('USUARIS_INTERNS', $resultado);
    $this->db->where('ID_USUARI', $id);
    $this->db->delete('VALIDAR_USUARIS');
  }

  public function getDocument() {
    $this->db->select('id_document, titul, document');
    $query = $this->db->get('DOCUMENTS');
    return $query->result_array();
  }
    public function inserta_resultats($id, $resultats) {
    $data = array(
      'RESULTATS' => $resultats
    );      
    $this->db->where('ID_COMPETICIO', $id);
    $this->db->update('DETALL_CALENDARI', $data);
  }
  public function get_calendari() {
    $this->db->select('ID_COMPETICIO, COMPETICIO, DATA_HORA_1, DATA_HORA_2, CATEGORIA, ESTAT, LLOC, RESULTATS');
    $query = $this->db->get('DETALL_CALENDARI');
    return $query->result_array();
  }
  public function get_calendari_usuaris() {
    $this->db->select('ID_COMPETICIO, COMPETICIO, DATA_HORA_1, DATA_HORA_2, CATEGORIA, ESTAT, LLOC, RESULTATS');
    $where = array('ESTAT ' => $this->session->userdata('ESTAT') , 'CATEGORIA ' => $this->session->userdata('CATEGORIA'));
     $this->db->where($where);
    $query = $this->db->get('DETALL_CALENDARI');
    return $query->result_array();
  }

  public function crearActualitat($titol, $comentari, $foto) {
    $data = array(
      'titol' => $titol,
      'comentari' => $comentari,
      'foto' => $foto
    );
 
    $this->db->insert('ACTUALITAT', $data);
  }

  public function crearDocument($nom, $document) {
    $data = array(
      'titul' => $nom,
      'document' => $document
    );
 
    $this->db->insert('DOCUMENTS', $data);
  }

  public function insertaUsuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email) {
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
      'email' => $email,

    );

    $this->db->insert('USUARIS_INTERNS', $data);
  }

  public function inserta_calendari($competicio, $data_hora_1, $data_hora_2, $estat, $categoria,  $lloc, $resultats){
    $data = array(
      'competicio' => $competicio,
      'data_hora_1' => $data_hora_1,
      'data_hora_2' => $data_hora_2,
      'estat' => $estat,
      'categoria' => $categoria,
      'lloc' => $lloc,
      'resultats' => $resultats
    );
    $this->db->insert('DETALL_CALENDARI', $data);
  }
   public function crearGaleria($titol, $url) {
    $data = array(
      'NOM' => $titol,
      'URL' => $url
    );
     $this->db->insert('GALERIES', $data);
  }
   public function crearGaleria_foto($titol, $foto) {
    $data = array(
      'ID_GALERIA' => $titol,
      'URL' => $foto
    );

    $this->db->insert('FOTOS', $data);
  }
  public  function eliminar_usuari($id){
      $this->db->where('ID_USUARI',$id);
      return $this->db->delete('USUARIS_INTERNS');
    }
     public  function eliminar_calendari($id){
      $this->db->where('ID_COMPETICIO',$id);
      return $this->db->delete('DETALL_CALENDARI');
    }
    public  function eliminar_validar_usuari($id){
      $this->db->where('ID_USUARI',$id);
      return $this->db->delete('VALIDAR_USUARIS');
    }

    public  function eliminar_document($id){
      $this->db->where('ID_DOCUMENT',$id);
      return $this->db->delete('DOCUMENTS');
    }

    public  function eliminar_urls($id){
      $this->db->where('ID_ENLLAS',$id);
      return $this->db->delete('URLS');
    }

  public  function eliminar_actualitat($id){
      $this->db->select('ID_BLOG, FOTO');
      $this->db->where('ID_BLOG',$id);     
      return $this->db->delete('ACTUALITAT');
    }

     public  function eliminar_foto($id){
      $this->db->where('NOM',$id);
      return $this->db->delete('GALERIES');
    }

  public function getUsuario($id) {   
    $this->db->where('ID_USUARI', $id);
    $query = $this->db->from('USUARIS_INTERNS');
    $this->db->where('ID_USUARI', $id);
    $query = $this->db->get(); 
    return $query;
  }
 
     function update_usuari($id, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email) {
        
        $data = array(
        'email' => $email,
        'nom' => $nom,
        'cognoms' => $cognoms,
        'foto' => $foto,
        'data_naixement' => $data_naixement,
        'rol' => $rol,
        'estat' => $estat,
        'categoria' => $categoria
        );
        $this->db->where('ID_USUARI', $id);
        return $this->db->update('USUARIS_INTERNS ', $data);
    }
    function update_actualitat($id, $titol, $comentari, $foto){
         $data = array(
        'TITOL' => $titol,
        'COMENTARI' => $comentari,
        'FOTO' => $foto
        );
         $this->db->where('ID_BLOG', $id);
        return $this->db->update('ACTUALITAT ', $data);
    }
   public function get_resultats($id) {   
    $this->db->select('ID_COMPETICIO, COMPETICIO, DATA_HORA_1, DATA_HORA_2, CATEGORIA, ESTAT, LLOC, RESULTATS');
    $query = $this->db->from('DETALL_CALENDARI');
    $this->db->where('ID_COMPETICIO', $id);
    $query = $this->db->get(); 
    return $query;
  }
    function modificar_resultats($id, $resultats) {
        
        $data = array(
        'ID_COMPETICIO' => $id,
        'resultats' => $resultats
        );

        $this->db->where('ID_COMPETICIO', $id);
        return $this->db->update('DETALL_CALENDARI ', $data);
    }

  

  }

?>
