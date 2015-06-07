<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Natacio extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->database();
	}
 
		function index(){
			$this->load->model('natacio_model');		
	       	$data = $this->natacio_model->getActualitat();
			$this->load->view('natacio/index', $data); // vista d'inici de clients
	}
	
	function quisom(){
			$this->load->view('natacio/Quisom'); // vista d'inici de clients
	}
	
	function registrat(){
			$this->load->view('natacio/registrat'); // vista d'inici de clients
	}
		
	
	function calendari(){
			$this->load->view('natacio/calendari'); // vista d'inici de clients
	}
	
	function contacta(){
			$this->load->view('natacio/contacta'); // vista d'inici de clients
	}
	
	
	
	function insertar_registre() {
				   $nom = $this->input->post('nom');
				   $cognom = $this->input->post('apellit');
				   $contrasenya = md5($this->input->post('password')); 
				   $rol = $this->input->post('categoria'); 
				   $estat = $this->input->post('estat'); 
				   $data = $this->input->post('data'); 
				   $this->load->model('actualitat_model');
				   $this->actualitat_model->insertaUsuari($nom,$cognom, $data ,$contrasenya, $rol, $estat);
				   redirect('admin/usuaris');
		
	}
	
	
}
