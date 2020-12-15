<?php
	class Template {
		protected $_ci;

		function __construct() {
			$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
		}

		function views($template = NULL, $data = NULL) {
			if ($template != NULL) {

				echo $this->_ci->load->view('admin/header', $data, TRUE);
				echo $this->_ci->load->view($template, $data, TRUE);
				echo $this->_ci->load->view('admin/footer', $data, TRUE);
			}
		}
	}
?>
