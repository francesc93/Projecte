<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	}
	function index(){
		$this->load->model('client_model');		
	    $data['actualitat'] = $this->client_model->getActualitat();
		$this->load->view('client/index', $data); // vista d'inici de clients
	}
	function llegirmes(){
		$this->load->model('client_model');	
		$id = $this->input->post('id');
	    $data['actualitat'] = $this->client_model->getActualitat_llegir_mes($id);
		$this->load->view('client/llegirmes', $data);			
	}
	function galeria_fotos(){
		$this->load->model('client_model');	
		$id = $this->input->post('id');
	    $data['galeria']= $this->client_model->galeria_fotos($id);
		$this->load->view('client/galeria_fotos', $data);	
	}	
	function quisom(){
			$this->load->view('client/quisom'); // vista quisom
	}
	function contacta(){
			$this->load->view('client/contacta'); // vista perfil
	}
	function calendari(){
		if($this->session->userdata('logueado')){
				$this->load->model('actualitat_model');
			   	$data['calendari']= $this->actualitat_model->get_calendari_usuaris();
				$this->load->view('client/calendari_nou', $data);
		}else{
			   	$this->load->view('client/login');
		}
	}	
	function galeria(){
			$this->load->model('client_model');
			$data= $this->client_model->getGaleria();
			$this->load->view('client/galeria', $data);
	}
	function urls(){
			$this->load->model('actualitat_model');		
		   	$data = $this->actualitat_model->get_urls();   
			$this->load->view('client/urls', $data); // vista documents
	}
	function documents(){
		if($this->session->userdata('logueado')){
			$this->load->model('actualitat_model');		
		   	$data = $this->actualitat_model->getDocument();   
			$this->load->view('client/documents', $data); // vista documents
		}else{
			$this->load->view('client/login');
		}
	}
	function login(){ 
			$data = array();
	      	$this->load->view('client/login', $data);
	}	
		
	function perfil(){
			$this->load->view('client/perfil'); // vista perfil
	}
	function registrat(){
			$this->load->view('client/registrat'); // vista perfil
	}
	function registra_usuari(){
				$this->form_validation->set_rules('nom','nom','required');
				$this->form_validation->set_rules('cognoms','cognoms','required');
				$this->form_validation->set_rules("email","email","trim|required|valid_email|xss_clean|is_unique[USUARIS_INTERNS.email]");
				$this->form_validation->set_rules('data_naixement','data de naixement','required');
		        $this->form_validation->set_rules('contrasenya', 'contrasenya', 'required');
		       	$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');


		        if ($this->form_validation->run() == FALSE )
		        {		        	
	            	$this->load->view('client/registrat');

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

					}
				   $foto = base_url()."actualitat/".$this->upload->file_name;	
				   $contrasenya = md5($this->input->post('contrasenya')); 
				   $nom = $this->input->post('nom'); 
				   $cognoms = $this->input->post('cognoms');
				   $email = $this->input->post('email');				   
				   $data_naixement = $this->input->post('data_naixement');  
				   $rol = "NEDADOR" ;
				   $estat = $this->input->post('estat'); 
				   $sexe = $this->input->post('sexe');
				   $this->load->model('client_model');				   			   
				   $originalDate = $data_naixement;
				   $newDate = date("d-m-Y", strtotime($originalDate));					 
				   $categoria = $this->calcular_categoria($sexe, $this->calcular_edad($newDate), $estat);
				   if($estat=='Master'){ 
						$categoria='Master';
					}
				   $this->client_model->registra_usuari($contrasenya, $nom, $cognoms, $foto, $data_naixement, $rol, $estat, $categoria, $sexe, $email);
				   $this->session->set_flashdata('correcto', '<div class="alert alert-success alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><span class="glyphicon glyphicon-ok">&nbsp;</span><strong>Registre inserit correctament</strong></div>');			
				   $this->session->flashdata('correcto', 'Usuario registrado correctamente!');				  
				   redirect('client/registrat','refresh');
				   }
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
							
		  function username_check($str)
    {
    	$this->db->select('ID_USUARI,EMAIL, NOM, CONTRASENYA,EMAIL, COGNOMS,FOTO, DATA_NAIXEMENT, ROL, ESTAT, CATEGORIA');
	    $query = $this->db->from('USUARIS_INTERNS');
	    $where = array('EMAIL ' => $str);
	    $this->db->where($where);
	    $consulta = $this->db->get();
	    $resultado = $consulta->row();

        if ($resultado==NULL)
        {
            $this->form_validation->set_message('username_check', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El email o contrasenya són incorrectes</div>');

            return FALSE;
        }
        else
        {
            return TRUE;
        }
    } 
	   public function iniciar_sessio() { 
	   			$this->form_validation->set_rules("email","email","required");
	   			$this->form_validation->set_rules("email","email","required|valid_email|xss_clean|is_unique[USUARIS_INTERNS.email]");
		        $this->form_validation->set_rules('contrasenya', 'contrasenya', 'required');
		       	$this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		       	$this->form_validation->set_message('is_unique', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El ja %s está registrat</div>');
		       	$this->form_validation->set_rules('email', 'email', 'callback_username_check'); 

		        if ($this->form_validation->run() == FALSE )
		        {		        	
	            	$this->load->view('client/login');
		        }
		        else
		        {
	         //processar formulari
	      if ($this->input->post()) {
	         $email = $this->input->post('email');
	         $contrasenya = md5($this->input->post('contrasenya'));
	         $this->load->model('client_model');
	         $usuario = $this->client_model->usuario_por_nombre_contrasena($email, $contrasenya);
	         
	         if ($usuario) {	         	     
	            $usuari_data = array(
	               'ID_USUARI' => $usuario->ID_USUARI,
	               'EMAIL' => $usuario->EMAIL,
	               'NOM' => $usuario->NOM,
	               'COGNOMS' => $usuario->COGNOMS,
	               'FOTO' => $usuario->FOTO,
	               'DATA_NAIXEMENT' => $usuario->DATA_NAIXEMENT,
	               'ROL' => $usuario->ROL,
	               'ESTAT' => $usuario->ESTAT,
	               'CATEGORIA' => $usuario->CATEGORIA,
	               'logueado' => TRUE
	            );	            
	            $this->session->set_userdata($usuari_data);
	            redirect('client/index');
	         } else {
	            $this->load->view('client/login');
	         }
	      } else {
	         $this->login();
	      }
	   }
	  }

	   public function cerrar_sesion() {
	      $usuario_data = array(
	         'logueado' => FALSE
	      );
	      $this->session->set_userdata($usuario_data);
	      $this->session->sess_destroy();
	      redirect('client/login');
	   }

	   public function enviar(){
	   			$this->load->library('email');
		        $this->form_validation->set_rules('nom', 'nom', 'required');
		        $this->form_validation->set_rules("email","email","trim|required|valid_email|xss_clean");
		        $this->form_validation->set_rules('asumpte', 'asumpte', 'required');
        	   	$this->form_validation->set_rules('missatge','missatge','required');
		        $this->form_validation->set_message('required', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El camp %s es obligat</div>');
		        $this->form_validation->set_message('valid_email', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El email no es valit</div>');



		        if ($this->form_validation->run() == FALSE){		        	
	            	$this->load->view('client/contacta');
		        }
		        else
		        { 	
		        		$configGmail = array(
							'protocol' => 'smtp',
							'smtp_host' => 'ssl://smtp.gmail.com',
							'smtp_port' => 465,
							'smtp_user' => 'ffores93@gmail.com', 
							'smtp_pass' => '47476183c93',
							'mailtype' => 'html',
							'charset' => 'utf-8',
							'newline' => "\r\n"
						); 
		        	$this->email->initialize($configGmail);
 

					$this->email->from($this->input->post('email'));
					$this->email->to('ffores93@gmail.com', 'Admin'); //email de club de natacio
					$this->email->subject($this->input->post('asumpte'));
					$this->email->message($this->input->post('missatge'));
					
					$this->email->send();
					if($this->email->send()){
		            	$this->session->set_flashdata('envio', '<div class="alert alert-success alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button><span class="glyphicon glyphicon-ok">&nbsp;</span><strong>Email enviat correctament</strong></div>');
		            	
			        }else{
			            $this->session->set_flashdata('envio', '<div class="alert alert-danger alert-dismissable"> <button type="button" data-dismiss="alert" aria-hidden="true" class="close">&times;</button> <strong>Error!<span class="glyphicons glyphicons-skull"></span></strong> El email no es valit</div>');
			        }	         
			        
					
		        	redirect("client/contacta");
				}			
	      
	   }   
	 /* public function envia(){
	   	$this->load->library('email');
					$this->email->from('ffores93@gmail.com');
					$this->email->to('ffores93@gmail.com');
					$this->email->subject('eeeeeeeeeeeeeoooooooooooooeeeeeeeeeeeeeeeee');
					$this->email->message('missateeeeeeeeeeeeeeege');
					$this->email->send();
					echo $this->email->print_debugger();
	      
	   }   */
		
}
