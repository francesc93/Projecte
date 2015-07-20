<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class actualitat_model extends CI_Model {
  public function __construct()
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
    $this->db->select('ID,NOM, URL');
    $query = $this->db->get('GALERIES');
    return $query->result_array();
  }
  public function galeria($id) {
     $this->db->select('NOM');
      $this->db->where('ID', $id);    
      $query = $this->db->get('GALERIES');
      return $query->result_array();
    }

 public function insertar_url($titol, $url){
    $data = array(
      'TITUL' => $titol,
      'URL' => $url
    );      
     $this->db->insert('URLS', $data);
    
    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');

      $id = $this->db->insert_id();
    $data = array(
      'ID_ENLLAS' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_URLS', $data);  
 }
   public function get_urls() {
    $this->db->select('ID_ENLLAS, TITUL, URL');
    $query = $this->db->get('URLS');
    return $query->result_array();
  }

     public function getestats() {
    $this->db->select('ID_ESTAT, ESTAT');
    $query = $this->db->get('ESTATS');
    return $query->result_array();
  }

  public function getcategoria() {
    $this->db->select('a.ID_CATEGORIA, a.CATEGORIA, a.ID_ESTAT, b.ESTAT, a.SEXE, a.PREFIX, a.DATA_INICI, a.DATA_FI');
    $this->db->from('CATEGORIES as a , ESTATS as b');
    $this->db->where('a.ID_ESTAT = b.ID_ESTAT');
    $this->db->order_by('a.ID_CATEGORIA', 'ASC');
    $query = $this->db->get(); 
    return $query->result_array();
  }

public function getUsuaris() {
    $this->db->select('a.ID_USUARI, NOM, a.EMAIL, a.COGNOMS, a.FOTO, a.DATA_NAIXEMENT, a.ROL, c.ESTAT, b.CATEGORIA, a.SEXE');
    $this->db->from('USUARIS as a, CATEGORIES as b, ESTATS as c');
    $this->db->where('a.ID_ESTAT = c.ID_ESTAT and a.ID_CATEGORIA = b.ID_CATEGORIA');
    $query = $this->db->get();
    return $query->result_array();
  }
public function getUsuaris_validar() {
    /*$this->db->select('ID_USUARI, NOM, EMAIL, COGNOMS, FOTO, DATA_NAIXEMENT, ROL, ESTAT, CATEGORIA, SEXE');
    $query = $this->db->get('VALIDAR_USUARIS');
    return $query->result_array();
    */
  }
  public function validar_usuari($id) {   
    /*$this->db->select('CONTRASENYA, NOM, EMAIL, COGNOMS, FOTO, DATA_NAIXEMENT, ROL, ESTAT, CATEGORIA, SEXE');
    $this->db->where('ID_USUARI', $id);    
    $consulta = $this->db->get('VALIDAR_USUARIS');
    $resultado = $consulta->row();    
    $this->db->insert('USUARIS', $resultado);
    $this->db->where('ID_USUARI', $id);
    $this->db->delete('VALIDAR_USUARIS');
    */
  }
public function getHistActualitat(){
    $this->db->select('a.ID_BLOG, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.TITOL');
    $this->db->from('HIST_ACTUALITAT as a, USUARIS as b, ACTUALITAT as c');
    $this->db->where('a.ID_BLOG = c.ID_BLOG and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}
public function getHistCalendari(){
    $this->db->select('a.ID_COMPETICIO, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.COMPETICIO');
    $this->db->from('HIST_COMPETICIONS as a, USUARIS as b, COMPETICIONS as c');
    $this->db->where('a.ID_COMPETICIO = c.ID_COMPETICIO and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}
public function getHistDocuments(){
    $this->db->select('a.ID_DOCUMENT, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.DOCUMENT');
    $this->db->from('HIST_DOCUMENTS as a, USUARIS as b, DOCUMENTS as c');
    $this->db->where('a.ID_DOCUMENT = c.ID_DOCUMENT and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}
public function getHistGaleries(){
    $this->db->select('a.ID_GALERIA, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.NOM as GALERIA');
    $this->db->from('HIST_GALERIES as a, USUARIS as b, GALERIES as c');
    $this->db->where('a.ID_GALERIA = c.ID and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}

public function getHistUsuaris(){
    $this->db->select('a.ID_USURAI_REGISTRAT, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, b.NOM as USUARI_REGSITRAT');
    $this->db->from('HIST_USUARIS as a, USUARIS as b');
    $this->db->where('a.ID_USURAI_REGISTRAT = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}
public function getHistUrls(){
    $this->db->select('a.ID_ENLLAS, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.TITUL');
    $this->db->from('HIST_URLS as a, USUARIS as b, URLS as c');
    $this->db->where('a.ID_ENLLAS = c.ID_ENLLAS and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}
public function getHistEstats(){
    $this->db->select('a.ID_ESTAT, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.ESTAT');
    $this->db->from('HIST_ESTATS as a, USUARIS as b, ESTATS as c');
    $this->db->where('a.ID_ESTAT = c.ID_ESTAT and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
}
public function getHistCategories(){
    $this->db->select('a.ID_CATEGORIA, a.ID_USUARI, a.DATA_PUBLICACIO,a.ACCIO, b.NOM, b.EMAIL, c.CATEGORIA');
    $this->db->from('HIST_CATEGORIES as a, USUARIS as b, CATEGORIES as c');
    $this->db->where('a.ID_CATEGORIA = c.ID_CATEGORIA and a.ID_USUARI = b.ID_USUARI ');
    $query = $this->db->get();
    return $query->result_array();
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
    $this->db->update('COMPETICIONS', $data);
  }
  public function get_calendari() {
    $this->db->select('ID_COMPETICIO, COMPETICIO, DATA_HORA_1, DATA_HORA_2, LLOC, RESULTATS, b.CATEGORIA, c.ESTAT');
    $this->db->from('COMPETICIONS as a, CATEGORIES as b, ESTATS as c');
    $this->db->where('a.ID_CATEGORIA = b.ID_CATEGORIA and a.ID_ESTAT = c.ID_ESTAT');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function get_calendari_usuaris() {
    $this->db->select('ID_COMPETICIO, COMPETICIO, DATA_HORA_1, DATA_HORA_2, b.CATEGORIA, c.ESTAT, LLOC, RESULTATS');
    $this->db->from('COMPETICIONS as a, CATEGORIES as b, ESTATS as c');
    $where = array('ESTAT ' => $this->session->userdata('ESTAT') , 'CATEGORIA ' => $this->session->userdata('CATEGORIA'));
    $this->db->where($where);
    $this->db->where('a.ID_CATEGORIA = b.ID_CATEGORIA and a.ID_ESTAT = c.ID_ESTAT');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function crearActualitat($titol, $comentari, $foto, $usuari, $date) {

      $data = array(
      'titol' => $titol,
      'comentari' => $comentari,
      'foto' => $foto
    );
    $this->db->insert('ACTUALITAT', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');


    $id = $this->db->insert_id();
    $data = array(
      'ID_BLOG' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_ACTUALITAT', $data);  
  }

  public function crearDocument($nom, $document) {
    $data = array(
      'titul' => $nom,
      'document' => $document
    );
 
    $this->db->insert('DOCUMENTS', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');

    $id = $this->db->insert_id();
    $data = array(
      'ID_DOCUMENT' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_DOCUMENTS', $data);  
  }

  public function insertar_estats($estat) {
    $data = array(
      'estat' => $estat
    );
    $this->db->insert('ESTATS', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');


    $id = $this->db->insert_id();
    $data = array(
      'ID_ESTAT' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_ESTATS', $data);  
  }

    public function insertar_categories($nom, $sexe, $prefix, $datai, $dataf, $estat){
    $data = array(
      'categoria' => $nom,
      'sexe' => $sexe,
      'prefix' => $prefix,
      'data_inici' => $datai,
      'data_fi' => $dataf,
      'id_estat' => $estat
    );
 
    $this->db->insert('CATEGORIES', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');

    $id = $this->db->insert_id();
    $data = array(
      'ID_CATEGORIA' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_CATEGORIES', $data);  
  }


  public function insertaUsuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email) {
    $data = array(
      'contrasenya' => $contrasenya,
      'nom' => $nom,
      'cognoms' => $cognoms,
      'foto' => $foto,
      'data_naixement' => $data_naixement,
      'rol' => $rol,
      'id_estat' => $estat,
      'id_categoria' => $categoria,
      'sexe' => $sexe,
      'email' => $email,
    );

    $this->db->insert('USUARIS', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');

    $id = $this->db->insert_id();
    $data = array(
      'ID_USURAI_REGISTRAT' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_USUARIS', $data);  
  }

  public function inserta_calendari($competicio, $data_hora_1, $data_hora_2, $estat, $categoria,  $lloc, $resultats){
    $data = array(
      'competicio' => $competicio,
      'data_hora_1' => $data_hora_1,
      'data_hora_2' => $data_hora_2,
      'id_estat' => $estat,
      'id_categoria' => $categoria,
      'lloc' => $lloc,
      'resultats' => $resultats
    );

    $this->db->insert('COMPETICIONS', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');

    $id = $this->db->insert_id();
    $data = array(
      'ID_COMPETICIO' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_COMPETICIONS', $data);  
  }

   public function crearGaleria($titol, $url) {
    $data = array(
      'NOM' => $titol,
      'URL' => $url
    );
     $this->db->insert('GALERIES', $data);

    $usuari = $this->session->userdata('ID_USUARI');
    $date = date('Y-m-d H:i:s');

    $id = $this->db->insert_id();
    $data = array(
      'ID_GALERIA' => $id,
      'ID_USUARI' => $usuari,
      'DATA_PUBLICACIO' => $date,
      'ACCIO' => 'Inserta'
    );
    $this->db->insert('HIST_GALERIES', $data);  
  }
   public function crearGaleria_foto($titol, $foto, $nom) {
    $id = $this->db->insert_id();
    $data = array(
      'NOM' => $nom,
      'ID_GALERIA' => $titol,
      'URL' => $foto,
    );

    $this->db->insert('FOTOS', $data);
  }
  public  function eliminar_usuari($id){
      $this->db->where('ID_USUARI',$id);
      return $this->db->delete('USUARIS');
    }
     public  function eliminar_calendari($id){
      $this->db->where('ID_COMPETICIO',$id);
      return $this->db->delete('COMPETICIONS');
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
      $this->db->where('ID',$id);
      return $this->db->delete('GALERIES');
    }

  public function getUsuario($id) {   
    $this->db->where('ID_USUARI', $id);
    $query = $this->db->from('USUARIS');
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
        'id_estat' => $estat,
        'id_categoria' => $categoria
        );
        $this->db->where('ID_USUARI', $id);
        return $this->db->update('USUARIS ', $data);
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
    $query = $this->db->from('COMPETICIONS');
    $this->db->where('ID_COMPETICIO', $id);
    $query = $this->db->get(); 
    return $query;
  }


  

  }

?>
