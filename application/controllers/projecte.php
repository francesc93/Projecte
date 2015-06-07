<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projecte extends CI_Controller {
	function __contruct(){
		parent::__contruct();
	}
		function index(){
			$this->load->view('vista_projecte');
	}
}

?>