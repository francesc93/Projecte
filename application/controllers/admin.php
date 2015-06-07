<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();
	}  
 
	function index(){
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ENTRENADOR' || $this->session->userdata('ROL')=='ADMINISTRADOR')){			
			$this->load->model('actualitat_model');	
			$data['actualitat'] = $this->actualitat_model->getActualitat();
			$this->load->view('admin/index', $data); 
		}else{
			redirect('client/login');
		}
	}
	function actualitat(){	
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ENTRENADOR' || $this->session->userdata('ROL')=='ADMINISTRADOR')){			
			$this->load->model('actualitat_model');		
	       		$data['actualitat'] = $this->actualitat_model->getActualitat();
	            $this->load->view('admin/gestioactualitat', $data);  
		}else{
			redirect('client/login');
		}				      
	}
	function calendari(){	
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ENTRENADOR' || $this->session->userdata('ROL')=='ADMINISTRADOR')){			
			$this->load->model('actualitat_model');		
	    		$data['calendari'] = $this->actualitat_model->get_calendari();			 
	        	$this->load->view('admin/gestiocalendari', $data);	         
		}else{
			redirect('client/login');
		} 			           
	}
	function documents(){	
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ADMINISTRADOR')){			
				$this->load->model('actualitat_model');		
		   		$data = $this->actualitat_model->getDocument();
		    	$this->load->view('admin/gestiodocuments', $data);	        
		}else{
			redirect('client/login');
		} 					
	        
	}	
		function urls(){	
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ADMINISTRADOR')){			
				$this->load->model('actualitat_model');		
		   		$data = $this->actualitat_model->get_urls();
		    	$this->load->view('admin/gestiourls', $data);	        
		}else{
			redirect('client/login');
		} 					
	        
	}
	function galeria(){
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ENTRENADOR' || $this->session->userdata('ROL')=='ADMINISTRADOR')){			
				$this->load->model('actualitat_model');
				$data = $this->actualitat_model->getgaleria();
				$this->load->view('admin/gestiogaleria', $data);  
		}else{
			redirect('client/login');
		} 							
	          
	}	
	function eliminar_foto() {
			$this->load->model('actualitat_model');
			$id = $this->uri->segment(3);
			$this->actualitat_model->eliminar_foto($id);			
			system('rm -rf ./galeria/'.$id.'/');
			redirect('admin/galeria');
	}
	function usuaris(){	
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ADMINISTRADOR')){			
				$this->load->model('actualitat_model');		
			    $data['usuaris'] = $this->actualitat_model->getUsuaris();
			    $data['validar_usuari'] = $this->actualitat_model->getUsuaris_validar();
			    $this->load->view('admin/gestiousuaris', $data);
		}else{
			redirect('client/login');
		}       
	}   
	function validar_usuari(){	
		if($this->session->userdata('logueado') && ($this->session->userdata('ROL')=='ADMINISTRADOR')){			
				$id = $this->uri->segment(3);
				$this->load->model('actualitat_model');	
				$this->actualitat_model->validar_usuari($id);
				redirect('admin/usuaris');
		}else{
			redirect('client/login');
		}		
	}
	function upload() {
		$data['content'] = 'actualitat';
		$this->load->vars($data);
		$this->load->view('actualitat');
	}
	function insertar_actualitat(){
	    $this->form_validation->set_rules('titol','Titul','required');
		$this->form_validation->set_rules('comentari', 'Comentari', 'required');
		$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		if ($this->form_validation->run() == FALSE)
		    {		    
	       		 $this->load->model('actualitat_model');		
	       		$data['actualitat'] = $this->actualitat_model->getActualitat();
	            $this->load->view('admin/gestioactualitat', $data);  
		    }
		    else
		    {
		        $titol = $this->input->post('titol');
				$comentari = $this->input->post('comentari');
				$config_file = array (
				'upload_path' => './actualitat/',
				'allowed_types' => 'png|jpg|jpeg',
				'overwrite' => false,
				'max_size' => 0,
				'max_width' => 0,
				'max_height' => 0,
				'encrypt_name' => false,
				'remove_spaces' => true,
				);
				$this->upload->initialize($config_file);
				if (!$this->upload->do_upload('foto')) {
					$foto = base_url()."assets/client/img/escut2.png";		  
					$this->load->model('actualitat_model');
					$this->actualitat_model->crearActualitat($titol, $comentari, $foto);
					redirect('admin/actualitat');
				}
				else {
					$foto = base_url()."actualitat/".$this->upload->file_name;		  
					$this->load->model('actualitat_model');
					$this->actualitat_model->crearActualitat($titol, $comentari, $foto);
					redirect('admin/actualitat');
	        	}
	    }
	}
	function inserta_resultats(){
		 $config_file = array (
					'upload_path' => './documents/',
					'allowed_types' => 'pdf',
					'overwrite' => false,
					'max_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'encrypt_name' => false,
					'remove_spaces' => true,
					);
				   $this->upload->initialize($config_file);
				   if (!$this->upload->do_upload('resultats')) {
						redirect('admin/calendari');
						$error = $this->upload->display_errors();
						echo $error;
					}
					else {
				   $id = $this->input->post('id');
				   $document = base_url()."documents/".$this->upload->file_name;		  
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->inserta_resultats($id, $document);
				   redirect('admin/calendari');
	        		}
	        		}
	
	function inserta_calendari(){
				$this->form_validation->set_rules('competicio','Competicio','required');
				$this->form_validation->set_rules('data_hora_1','Data','required');
				$this->form_validation->set_rules('data_hora_2','Data fi','required');
				$this->form_validation->set_rules('estat','Estat','required');
				$this->form_validation->set_rules('categoria','Categoria','required');
				$this->form_validation->set_rules('lloc','Lloc','required');
				$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');

		        if ($this->form_validation->run() == FALSE)
		        {		        	
		            $this->load->model('actualitat_model');		
		    		$data['calendari'] = $this->actualitat_model->get_calendari();			 
		        	$this->load->view('admin/gestiocalendari', $data);	
		        }else{		       
				   $competicio = $this->input->post('competicio');
				   $data_hora_1 = $this->input->post('data_hora_1');
				   $data_hora_2 = $this->input->post('data_hora_2'); 
				   $estat = $this->input->post('estat'); 
				   $categoria = $this->input->post('categoria');
				   $lloc = $this->input->post('lloc');
				  
				   if($estat=='Master'){ 
						$categoria='MASTER';
					}

				   $this->load->model('actualitat_model');
				   $this->actualitat_model->inserta_calendari($competicio, $data_hora_1, $data_hora_2, $estat, $categoria, $lloc, $resultats);
				   redirect('admin/calendari');
				    }
	        	  
	}
	function insertar_document(){	
					
				   $config_file = array (
					'upload_path' => './documents/',
					'allowed_types' => 'pdf',
					'overwrite' => false,
					'max_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'encrypt_name' => false,
					'remove_spaces' => true,
					);
				   $this->upload->initialize($config_file);
				   if (!$this->upload->do_upload('document')) {
						redirect('admin/documents');
						$error = $this->upload->display_errors();
						echo $error;
					}
					else {
				   $nom = $this->upload->file_name;
				   $document = base_url()."documents/".$this->upload->file_name;		  
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->crearDocument($nom, $document);
				   redirect('admin/documents');
	        		
	        	}
	}
	function insertar_url(){	
				$this->form_validation->set_rules('titol','titol','required');
				$this->form_validation->set_rules('url','Nom','required');
				$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		       if ($this->form_validation->run() == FALSE)
		        {		        	
		            $this->load->model('actualitat_model');		
			   		$data = $this->actualitat_model->getDocument();
			    	$this->load->view('admin/gestiourls', $data);
		        }else{		
				   
				   $titol = $this->input->post('titol');
				   $url = $this->input->post('url');		  
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->insertar_url($titol, $url);
				   redirect('admin/urls');
	        		
	        	}
	}
	function insert_galeria (){
			$this->form_validation->set_rules('titol','Titol','required');
			$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
			$this->form_validation->set_rules("titol","titol","required|xss_clean|is_unique[GALERIES.nom]");
			$this->form_validation->set_message('is_unique', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El %s  jaestá registrat</div>');

	
	if ($this->form_validation->run() == FALSE)
	{
		$this->load->model('actualitat_model');
		$data = $this->actualitat_model->getgaleria();
		$this->load->view('admin/gestiogaleria', $data);  
	}
	else
	{
		$titol = $this->input->post('titol');
		$url = base_url()."galeria/".$titol."";
		mkdir('./galeria/'.$titol.'/');
		chmod('./galeria/'.$titol, 0777);
		$config_file = array (
		'upload_path' => './galeria/'.$titol.'/',
		'allowed_types' => 'png|jpg|jpeg|gif',
		'overwrite' => false,
		'max_size' => 0,
		'max_width' => 0,
		'max_height' => 0,
		'encrypt_name' => false,
		'remove_spaces' => true,
		);
	$this->upload->initialize($config_file);
	if(!$this->upload->do_multi_upload('archivos')) {		
	}
	else {	
	}
	$document = base_url()."galeria/".$titol."/".$this->upload->file_name;
	$tot = count($this->upload->get_multi_upload_data());
	//este for recorre el arreglo
	$this->load->model('actualitat_model');
	$this->actualitat_model->crearGaleria($titol, $url);

	for ($i = 0; $i < $tot; $i++){
	//con el indice $i, poemos obtener la propiedad que desemos de cada archivo
	//para trabajar con este
	echo $foto =base_url()."galeria/".$titol."/".$this->upload->get_multi_upload_data()[$i]["file_name"];
	echo("<br />");
	$this->load->model('actualitat_model');
	$this->actualitat_model->crearGaleria_foto($titol, $foto);
	

	}redirect('admin/galeria');
	}
 //Preguntamos si nuetro arreglo 'archivos' fue definido


	}
			function do_upload_multiple(){	
					//$titol = 	 
					$directori = $this->input->post('titol');   
					mkdir('./galeria/'.$directori.'/');
				 	chmod('./galeria/'.$directori, 0777);
				 
				 $config_file = array (
					'upload_path' => './galeria/'.$directori.'/',
					'allowed_types' => 'png|jpg|jpeg|gif',
					'overwrite' => false,
					'max_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'encrypt_name' => false,
					'remove_spaces' => true,
					);
				   $this->upload->initialize($config_file);
					//$this->load->library('upload');
					//$this->upload->initialize($config);
					
					if(!$this->upload->do_multi_upload('archivo')) {
						echo $this->upload->display_errors('<p><b>','</b></p>');
						
						}
					else {
					$datos['success'] = $this->upload->get_multi_upload_data();
				   $titol = $this->input->post('titol');	
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->crearGaleria($titol);
				   redirect('admin/galeria');
	        }
	    }
	
	function insertar_usuari(){	
		        $this->form_validation->set_rules('nom','nom','required');
		        $this->form_validation->set_rules('contrasenya', 'contrasenya', 'required');
		        $this->form_validation->set_rules("email","email","required|valid_email|xss_clean|is_unique[USUARIS_INTERNS.email]");
		        $this->form_validation->set_rules('data_naixement', 'Data naixement', 'required');		        
		        $this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El  %s ja está registrat</div>');

		        if ($this->form_validation->run() == FALSE)
		        {		        	
		            $this->load->model('actualitat_model');		
				    $data['usuaris'] = $this->actualitat_model->getUsuaris();
				    $data['validar_usuari'] = $this->actualitat_model->getUsuaris_validar();
				    $this->load->view('admin/gestiousuaris', $data);
		        }
		        else
		        {
		           
				   $config_file = array (
					'upload_path' => './actualitat/',
					'allowed_types' => 'png|jpg|jpeg',
					'overwrite' => false,
					'max_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'encrypt_name' => false,
					'remove_spaces' => true,
					);
				   $this->upload->initialize($config_file);
				   if (!$this->upload->do_upload('foto')) {
						$foto = NULL;	
				   $usuari = $this->input->post('usuari');
				   $contrasenya = md5($this->input->post('contrasenya'));
				   $email = $this->input->post('email');
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = $this->input->post('rol'); 
				   $estat = $this->input->post('estat'); 
				   $sexe = $this->input->post('sexe'); 
				   $categoria = $this->input->post('categoria'); 
				   $this->load->model('actualitat_model');
				   $newDate = date('d-m-Y', strtotime($data_naixement));
				   $categoria = $this->calcular_categoria($sexe, $this->calcular_edad($newDate), $estat);
				   if($estat=='MASTER'){ 
						$categoria='MASTER';
					}
				   $this->actualitat_model->insertaUsuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email);
				   redirect('admin/usuaris');
					}
					else {
				   $foto = base_url()."actualitat/".$this->upload->file_name;	
				   $usuari = $this->input->post('usuari');
				   $contrasenya = md5($this->input->post('contrasenya'));
				   $email = $this->input->post('email');
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = $this->input->post('rol'); 
				   $estat = $this->input->post('estat'); 
				   $sexe = $this->input->post('sexe'); 
				   $categoria = $this->input->post('categoria'); 
				   $this->load->model('actualitat_model');
				   $newDate = date('d-m-Y', strtotime($data_naixement));
				   $categoria = $this->calcular_categoria($sexe, $this->calcular_edad($newDate), $estat);
				   if($estat=='MASTER'){ 
						$categoria='MASTER';
					}
				   $this->actualitat_model->insertaUsuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email);
				   redirect('admin/usuaris');
	        	   }		          
	        	}
	}
	function eliminar_usuari() {
	    		$this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_usuari($id);
				 redirect('admin/usuaris');	
	}
		function eliminar_calendari() {
	    		$this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_calendari($id);
				 redirect('admin/calendari');	
	}
	function eliminar_validar_usuari() {
	    		$this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_validar_usuari($id);
				 redirect('admin/usuaris');	
	}
	function eliminar_document() {
	    		$this->load->model('actualitat_model');		
				$id = $this->uri->segment(3);
				$this->actualitat_model->eliminar_document($id);
				redirect('admin/documents');
	}
	function eliminar_url() {
	    		$this->load->model('actualitat_model');		
				$id = $this->uri->segment(3);
				$this->actualitat_model->eliminar_urls($id);
				redirect('admin/urls');
	}
	function eliminar_actualitat() {
	    		 $this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_actualitat($id);
				 redirect('admin/actualitat');	
	}
	function get_usuari($id) {
				$this->load->model('actualitat_model');	              
				$data = $this->actualitat_model->getUsuario($id)->row();					  			  
				$this->load->view('admin/modificar_usuari', $data);
	}
	function modificar_usuari() {
				$this->form_validation->set_rules('nom','nom','required');
		        $this->form_validation->set_rules('data_naixement', 'Data naixement', 'required');
		        $this->form_validation->set_rules('email', 'email', 'required');
		        $this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');

		        if ($this->form_validation->run() == FALSE)
		        {		        	
		        $id = $this->uri->segment(3);
		        $this->load->model('actualitat_model');	              
				$data = $this->actualitat_model->getUsuario($id)->row();					  			  
				$this->load->view('admin/modificar_usuari', $data);
		        }
		        else
		        {
					$config_file = array (
					'upload_path' => './actualitat/',
					'allowed_types' => 'png|jpg|jpeg',
					'overwrite' => false,
					'max_size' => 0,
					'max_width' => 0,
					'max_height' => 0,
					'encrypt_name' => false,
					'remove_spaces' => true,
					);
				   $this->upload->initialize($config_file);
				  
				   $this->load->model('actualitat_model');		
				   $id = $this->uri->segment(3);
				   
				  $foto = base_url()."actualitat/".$this->upload->file_name;	
				   $usuari = $this->input->post('usuari');
				   $contrasenya = md5($this->input->post('contrasenya'));
				   $email = $this->input->post('email');
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = $this->input->post('rol'); 
				   $estat = $this->input->post('estat'); 
				   $categoria = $this->input->post('categoria'); 
				   $sexe = $this->input->post('sexe'); 
				   $this->load->model('actualitat_model');
				   $newDate = date('d-m-Y', strtotime($data_naixement));
				   $categoria = $this->calcular_categoria($sexe, $this->calcular_edad($newDate), $estat);
				   if($estat=='Master'){ 
						$categoria='Master';
					}    

				   $this->actualitat_model->update_usuari($id, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email);
				   redirect('admin/usuaris');
				}
	        	   
	}

	function update_actualitat() {
		$this->form_validation->set_rules('titol','Titul','required');
		$this->form_validation->set_rules('comentari', 'Comentari', 'required');
        $this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');



		if ($this->form_validation->run() == FALSE)
		    {
		    $this->load->model('actualitat_model');		
	       	$data['actualitat'] = $this->actualitat_model->getActualitat();
	        $this->load->view('admin/gestioactualitat', $data);
		    }
		    else
		    {
		    	$id = $this->input->post('id');
		        $titol = $this->input->post('titol');
				$comentari = $this->input->post('comentari');
				$config_file = array (
				'upload_path' => './actualitat/',
				'allowed_types' => 'png|jpg|jpeg',
				'overwrite' => false,
				'max_size' => 0,
				'max_width' => 0,
				'max_height' => 0,
				'encrypt_name' => false,
				'remove_spaces' => true,
				);
				$this->upload->initialize($config_file);
				if (!$this->upload->do_upload('foto')) {
					 if($this->input->post('foto')==NULL){
        				$foto = $this->input->post('foto2'); 
       				 }else{        	
					$foto = base_url()."assets/client/img/escut2.png";		
					}  
					$this->load->model('actualitat_model');
					$this->actualitat_model->update_actualitat($id, $titol, $comentari, $foto);
					redirect('admin/actualitat');
				}
				else {
					$foto = base_url()."actualitat/".$this->upload->file_name;		  
					$this->load->model('actualitat_model');
					$this->actualitat_model->update_actualitat($id, $titol, $comentari, $foto);
					redirect('admin/actualitat');
	        	}
	    }
	}



	public function is_unique($str, $field)
			{
			list($table, $field)=explode('.', $field);
			$query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
			return $query->num_rows() === 0;
			}
	   function calcular_edad($fecha){
					    $dias = explode("-", $fecha, 3);
					    $dias = mktime(0,0,0,$dias[1],$dias[0],$dias[2]);
					    $edad = (int)((time()-$dias)/31556926 );
					    return $edad;
					}

					// Funcio per calcular la categoria tenin en compte el sexe 
					function calcular_categoria($sexe,$edad,$estat) {
						switch($estat){
							case 'Escolar':
								switch ($edad) {
									case 7:
									case 8:
										return 'PB';
										break;
									case 9:
									case 10:
										return 'B';
										break;
									case 11:
									case 12:
										return 'ALE';
										break;
									case 13:
									case 14:
										return 'INF';
										break;
									case 15:
									case 16:
										return 'JUV';
										break;
									default:
									return 'CAD';
									break;
								}
								break;
						case 'Federat':
						switch ($sexe) {
							case 'Masculí':
								switch ($edad) {
									case 8:
										return 'PB';
										break;
									case 9:
									case 10:
									case 11:
										return 'B';
										break;
									case 12:
									case 13:
										return 'ALE';
										break;
									case 14:
									case 15:
									case 16:
										return 'INF';
										break;
									case 17:
									case 18:
										return 'JUV';
										break;
									case 19:
									case 20:
										return 'ABJ';
										break;
									default:
									return 'ABS'; 
									break;

								}
								break;
							case 'Femení':
								switch ($edad) {
									case 8:
										return 'PB';
										break;
									case 9:
									case 10:
										return 'B';
										break;
									case 11:
									case 12:
										return 'ALE';
										break;
									case 13:
									case 14:
										return 'INF';
										break;
									case 15:
									case 16:
										return 'JUV';
										break;
									case 17:
									case 18:
										return 'ABJ';
										break;
									default:
										return 'ABS';

								}
						}
						break;
					}

					}

					function calcular_temporada($anys) {
					            // Agafem el principi de cada temporada nova 
					            $ninici = "1-09-".date("Y");
					            $nfinal = "31-08-".date("Y", strtotime('+1 year'));
					            // Convertixo les dates a format date           
					            $minici =  strtotime($ninici);
					            $mfinal = strtotime($nfinal);
					            // Agafo la data pasada per parametre que es uns string i la paso a DATA
					            $fechaNaixement = strtotime($anys);
					            $dataarreglada= date('d-m-Y',$fechaNaixement);
					            for($i=$minici; $i<=$mfinal; $i+=86400) {
					                if( date('d',$fechaNaixement)== date('d',$i) && date('m',$fechaNaixement)== date('m',$i)) {
					                   $edat = date("Y", strtotime('+1 year')) - date('Y',$fechaNaixement);
					                    return $edat;
					                }
					            }
						}

}	
?>
