<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	  public function __construct()
       {
            parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();
	}  
	public function loguejat(){
		if($this->session->userdata('logueado')){
			return 1;
		}else{
		return 0;}
	}
	public function rol(){
		if($this->session->userdata('ROL')=='ENTRENADOR' || $this->session->userdata('ROL')=='ADMINISTRADOR'){
			return 1;
		}else{
		return 0;}
	}
	public function index(){
		if($this->loguejat() && $this->rol()){			
			$this->load->model('actualitat_model');	
			$data = array();
			$data['actualitat'] = $this->actualitat_model->getActualitat();
			$this->load->view('admin/index', $data); 
		}else{
			redirect('client/login');
		}
	}
	public function actualitat(){	
		if($this->loguejat() && $this->rol()){				
			$this->load->model('actualitat_model');		
			$data = array();
	       	$data['actualitat'] = $this->actualitat_model->getActualitat();
	        $this->load->view('admin/gestioactualitat', $data);  
		}else{
			redirect('client/login');
		}				      
	}

	public function estats(){	
		if($this->loguejat() && $this->rol()){				
			$this->load->model('actualitat_model');		
			$data = array();
	       	$data['estats'] = $this->actualitat_model->getestats();
	        $this->load->view('admin/gestioestats', $data);    
		}else{
			redirect('client/login');
		}				      
	}

	public function categories(){	
		if($this->loguejat() && $this->rol()){				
			$this->load->model('actualitat_model');		
			$data = array();
	       	$data['categories'] = $this->actualitat_model->getcategoria();
	       	$data['estats'] = $this->actualitat_model->getestats();
	        $this->load->view('admin/gestiocategories', $data);    
		}else{
			redirect('client/login');
		}				      
	}
	public function calendari(){	
		if($this->loguejat() && $this->rol()){				
			$this->load->model('actualitat_model');		
			$data = array();
	    		$data['calendari'] = $this->actualitat_model->get_calendari();			
	    		 $data['categories'] = $this->actualitat_model->getcategoria();
	       		$data['estats'] = $this->actualitat_model->getestats(); 
	        	$this->load->view('admin/gestiocalendari', $data);	         
		}else{
			$this->load->model('actualitat_model');		
			$data = array();
			 $data['categories'] = $this->actualitat_model->getcategoria();
	       		$data['estats'] = $this->actualitat_model->getestats();
	    		$data['calendari'] = $this->actualitat_model->get_calendari();			 
	        	$this->load->view('admin/gestiocalendari', $data);	      
		} 			           
	}
	public function documents(){	
		if($this->loguejat() && $this->rol()){				
				$this->load->model('actualitat_model');		
		   		$data = $this->actualitat_model->getDocument();
		    	$this->load->view('admin/gestiodocuments', $data);	        
		}else{
			redirect('client/login');
		} 					
	        
	}	
	public function urls(){	
		if($this->loguejat() && $this->rol()){				
				$this->load->model('actualitat_model');		
		   		$data = $this->actualitat_model->get_urls();
		    	$this->load->view('admin/gestiourls', $data);	        
		}else{
			redirect('client/login');
		} 					
	        
	}
	public function galeria(){
		if($this->loguejat() && $this->rol()){				
				$this->load->model('actualitat_model');
				$data = $this->actualitat_model->getgaleria();
				$this->load->view('admin/gestiogaleria', $data);  
		}else{
			redirect('client/login');
		} 							
	          
	}	
	public function historial(){
		if($this->loguejat() && $this->rol()){			
			$this->load->model('actualitat_model');	
			$data = array();
			$data['actualitat'] = $this->actualitat_model->getHistActualitat();
			$data['calendari'] = $this->actualitat_model->getHistCalendari();
			$data['documents'] = $this->actualitat_model->getHistDocuments();
			$data['galeries'] = $this->actualitat_model->getHistGaleries();			
			$data['usuaris'] = $this->actualitat_model->getHistUsuaris();
			$data['urls'] = $this->actualitat_model->getHistUrls();		
			$data['estats'] = $this->actualitat_model->getHistEstats();	
			$data['categories'] = $this->actualitat_model->getHistCategories();	
			$this->load->view('admin/gestiohistorial', $data); 
		}else{
			redirect('client/login');
		}
	}
	public function eliminar_foto() {
			$this->load->model('actualitat_model');
			$id = $this->uri->segment(3);
			$this->actualitat_model->eliminar_foto($id);			
			redirect('admin/galeria');
	}
	public function usuaris(){	
		if($this->loguejat() && $this->rol()){				
				$this->load->model('actualitat_model');	
				$data = array();	
			    $data['usuaris'] = $this->actualitat_model->getUsuaris();
			    $data['validar_usuari'] = $this->actualitat_model->getUsuaris_validar();
			    $data['categories'] = $this->actualitat_model->getcategoria();
	       		$data['estats'] = $this->actualitat_model->getestats();
			    $this->load->view('admin/gestiousuaris', $data);
		}else{
			redirect('client/login');
		}       
	}   
	public function validar_usuari(){	
		if($this->loguejat() && $this->rol()){				
				$id = $this->uri->segment(3);
				$this->load->model('actualitat_model');	
				$this->actualitat_model->validar_usuari($id);
				redirect('admin/usuaris');
		}else{
			redirect('client/login');
		}		
	}
	public function upload() {
		$data['content'] = 'actualitat';
		$this->load->vars($data);
		$this->load->view('actualitat');
	}
	public function insertar_actualitat(){
	    $this->form_validation->set_rules('titol','Titul','required');
		$this->form_validation->set_rules('comentari', 'Comentari', 'required');
		$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		if ($this->form_validation->run() == FALSE)
		    {		    
	       		 $this->load->model('actualitat_model');
	       		 $data = array();		
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
	public function inserta_resultats(){
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
	
	public function inserta_calendari(){
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
		            $data = array();
		    		$data['calendari'] = $this->actualitat_model->get_calendari();			 
		        	$this->load->view('admin/gestiocalendari', $data);	
		        }else{	
		           foreach ($_POST["categoria"] as $key => $value) {
		           	       	$competicio = $this->input->post('competicio');
				   $data_hora_1 = $this->input->post('data_hora_1');
				   $data_hora_2 = $this->input->post('data_hora_2'); 
				   $estat = $this->input->post('estat'); 
				   
				   $lloc = $this->input->post('lloc');
				   $resultats = NULL;
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->inserta_calendari($competicio, $data_hora_1, $data_hora_2, $estat, $value, $lloc, $resultats);
		           	       }	       
				   
				   redirect('admin/calendari');
				    }	        	  
	}
	public function insertar_document(){	
					
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
	public function insertar_url(){	
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

	public function insertar_estat(){	
				$this->form_validation->set_rules('estat','estat','required');
				$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		       if ($this->form_validation->run() == FALSE)
		        {		        	
		            $this->load->model('actualitat_model');		
			   		$data = $this->actualitat_model->getestats();
			    	$this->load->view('admin/gestioestats', $data);
		        }else{		
				   
				   $estat = $this->input->post('estat');	  
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->insertar_estats($estat);
				   redirect('admin/estats');
	        		
	        	}
	}

	public function insertar_categoria(){	
				$this->form_validation->set_rules('prefix','prefix','required');
				$this->form_validation->set_rules('nom','nom','required');
				$this->form_validation->set_rules('estat','estat','required');
				$this->form_validation->set_rules('datai','datai','required');
				$this->form_validation->set_rules('dataf','dataf','required');
				$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		       if ($this->form_validation->run() == FALSE)
		        {		        	
		            $this->load->model('actualitat_model');		
			   		$data = array();
			       	$data['categories'] = $this->actualitat_model->getcategoria();
			       	$data['estats'] = $this->actualitat_model->getestats();
			        $this->load->view('admin/gestiocategories', $data);    
		        }else{		
				   
				   $nom = $this->input->post('nom');	
				   $sexe = $this->input->post('sexe');	
				   $prefix = $this->input->post('prefix');	
				   $datai = $this->input->post('datai');	
				   $dataf = $this->input->post('dataf');	
				   $estat = $this->input->post('estat');  
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->insertar_categories($nom, $sexe, $prefix, $datai, $dataf, $estat);
				   redirect('admin/categories');
	        		
	        	}
	}

	public function insert_galeria (){
			$this->form_validation->set_rules('titol','Titol','required');
			$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
			$this->form_validation->set_rules("titol","titol","required|xss_clean|is_unique[GALERIES.nom]");
			$this->form_validation->set_message('is_unique', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> La galeria %s  ja está registrada</div>');

	
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
	//$document = base_url()."galeria/".$titol."/".$this->upload->file_name;
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
	$nom = $this->upload->get_multi_upload_data()[$i]["file_name"];
	$this->actualitat_model->crearGaleria_foto($titol, $foto, $nom);

	}redirect('admin/galeria');
	}
 //Preguntamos si nuetro arreglo 'archivos' fue definido


	}
			public function do_upload_multiple(){	
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
				   $datos = array();
				   $datos['success'] = $this->upload->get_multi_upload_data();
				   $titol = $this->input->post('titol');	
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->crearGaleria($titol);
				   redirect('admin/galeria');
	        }
	    }
	
	public function insertar_usuari(){	
		        $this->form_validation->set_rules('nom','nom','required');
		        $this->form_validation->set_rules('cognoms','cognoms','required');
		        $this->form_validation->set_rules('estat','estat','required');
		        $this->form_validation->set_rules('sexe','sexe','required');
		        $this->form_validation->set_rules('rol','rol','required');
		        $this->form_validation->set_rules('contrasenya', 'contrasenya', 'required');
		        $this->form_validation->set_rules("email","email","required|valid_email|xss_clean|is_unique[USUARIS.email]");
		        $this->form_validation->set_rules('data_naixement', 'Data naixement', 'required');		        
		        $this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		        $this->form_validation->set_message('is_unique', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El  %s ja está registrat</div>');

		        if ($this->form_validation->run() == FALSE)
		        {		        	
		            $this->load->model('actualitat_model');	
		            $data = array();	
				    $data['usuaris'] = $this->actualitat_model->getUsuaris();
				    $data['validar_usuari'] = $this->actualitat_model->getUsuaris_validar();
				    $data['categories'] = $this->actualitat_model->getcategoria();
	       			$data['estats'] = $this->actualitat_model->getestats();
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
				 $foto = base_url()."assets/client/img/escut2.png";	
				   
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $contrasenya = md5($this->input->post('contrasenya'));
				   $email = $this->input->post('email');
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = $this->input->post('rol'); 
				   $estat = $this->input->post('estat'); 
				   $sexe = $this->input->post('sexe'); 	
				   $this->load->model('actualitat_model');
				   $categoria = $this->calcular_categoria($sexe,$data_naixement,$estat);				   
				   $this->actualitat_model->insertaUsuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email);
					redirect('admin/usuaris');	
					}
					else {
				   $foto = base_url()."actualitat/".$this->upload->file_name;	
				  
				   $contrasenya = md5($this->input->post('contrasenya'));
				   $email = $this->input->post('email');
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = $this->input->post('rol'); 
				   $estat = $this->input->post('estat'); 
				   $sexe = $this->input->post('sexe'); 	
				   $this->load->model('actualitat_model');
				   $categoria = $this->calcular_categoria($sexe,$data_naixement,$estat);				   
				   $this->actualitat_model->insertaUsuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email);
	        	   redirect('admin/usuaris');	
	        	   }		          
	        	}
	}
	public function eliminar_usuari() {
	    		$this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_usuari($id);
				 redirect('admin/usuaris');	
	}
		public function eliminar_calendari() {
	    		$this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_calendari($id);
				 redirect('admin/calendari');	
	}
	public function eliminar_validar_usuari() {
	    		$this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_validar_usuari($id);
				 redirect('admin/usuaris');	
	}
	public function eliminar_document() {
	    		$this->load->model('actualitat_model');		
				$id = $this->uri->segment(3);
				$this->actualitat_model->eliminar_document($id);
				redirect('admin/documents');
	}
	public function eliminar_url() {
	    		$this->load->model('actualitat_model');		
				$id = $this->uri->segment(3);
				$this->actualitat_model->eliminar_urls($id);
				redirect('admin/urls');
	}
	public function eliminar_actualitat() {
	    		 $this->load->model('actualitat_model');		
				 $id = $this->uri->segment(3);
				 $this->actualitat_model->eliminar_actualitat($id);
				 redirect('admin/actualitat');	
	}
	public function get_usuari($id) {
				$this->load->model('actualitat_model');	              
				$data = $this->actualitat_model->getUsuario($id)->row();
				$data['categories'] = $this->actualitat_model->getcategoria();
				$data['estats'] = $this->actualitat_model->getestats();					  			  
				$this->load->view('admin/modificar_usuari', $data);
	}
	public function modificar_usuari() {
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
				  
				   $email = $this->input->post('email');
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = $this->input->post('rol'); 
				   $estat = $this->input->post('estat');  
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

	public function update_actualitat() {
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
	   public function calcular_edad($fechanacimiento){
					     list($ano,$mes,$dia) = explode("-",$fechanacimiento);
					    $ano_diferencia  = date("Y") - $ano;
					    $mes_diferencia = date("m") - $mes;
					    $dia_diferencia   = date("d") - $dia;
					    if ($dia_diferencia < 0 || $mes_diferencia < 0)
					        $ano_diferencia--;
					    return $ano_diferencia;
					}

					// Funcio per calcular la categoria tenin en compte el sexe 
					public function calcular_categoria($sexe,$data_naixement,$estat) {
					/*$this->db->select('a.ID_CATEGORIA,  b.ID_ESTAT, a.Categoria, b.ESTAT, a.SEXE, a.DATA_INICI, a.DATA_FI');*/
					$this->db->select('a.ID_CATEGORIA');
				    $this->db->from('CATEGORIES as a, ESTATS as b ');
				    $this->db->where('a.ID_ESTAT = b.ID_ESTAT and b.ID_ESTAT = "'.$estat.'" and ( a.DATA_INICI <= "'.$data_naixement.'" and a.DATA_FI >= '.$data_naixement.' ) and ( a.SEXE = "'.$sexe.'" or a.SEXE is NULL)');
				    $query = $this->db->get(); 
				    $result = $query->result_array();				    
				    return $result[0]['ID_CATEGORIA'];
					}

					public function calcular_temporada($anys) {
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
