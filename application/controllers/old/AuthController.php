<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {

    public function login(){
        $data = array(
			'title' => "Login"
		);
		$this->load->view('auth/login', $data);
    }

    public function login_process(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        if($username == "admin" && $password == "admin"){
            redirect(base_url('admin/dashboard'));
        }
        else if($username == "operator" && $password == "operator"){
            redirect(base_url('operator/dashboard'));
        }
        else{
            redirect(base_url('login'));
        }
    }
}