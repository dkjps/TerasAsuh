<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_auth');
		$this->load->model('AuthApiModel');
	}

	public function index() {
		$session = $this->session->userdata('status');

		if ($session == '') {
			$this->load->view('login');
		} else {
			redirect('Home');
		}

	}

	function login(){
			$data = array(
					'user' => $this->input->post('user'),
					'password' => $this->input->post('password')
			);

			if (filter_var($data['user'], FILTER_VALIDATE_EMAIL)) {
					$result = $this->AuthApiModel->loginByEmail($data)->result();
					if ($result) {
							if (password_verify($data['password'], $result[0]->password)) {
									$view = array(
											'id' => $result[0]->id,
											'role' => $result[0]->role
									);
									$result2 = $this->AuthApiModel->getViewByRole($view)->row();
									if(!empty($result2)){
										$return = array(
											'status'=>200,
											'message'=>'Sukses Login!',
											'data'=>$result2
										);
										$this->session->set_userdata('id', $result2->id);
										$this->session->set_userdata('email', $result2->email);
										$this->session->set_userdata('namalengkap', $result2->namalengkap);
										$this->session->set_userdata('role', $result2->role);
										$this->session->set_userdata('status', 1);
										redirect(base_url("home"));
									}else{
										$return = array(
											'status'=>200,
											'message'=>'Data Tidak Ada!',
											'data'=>null
										);
									}
							} else {
								$return = array(
									'status'=>200,
									'message'=>'Password Salah',
									'data'=>null
								);
							}
					} else {
						$return = array(
							'status'=>200,
							'message'=>'Email Salah!',
							'data'=>null
						);
					}
			} else {
					$result = $this->AuthApiModel->loginByHp($data)->result();
					if ($result) {
							if (password_verify($data['password'], $result[0]->password)) {
									$view = array(
											'id' => $result[0]->id,
											'role' => $result[0]->role
									);
									$result2 = $this->AuthApiModel->getViewByRole($view)->result();
									if(!empty($result2)){
										$return = array(
											'status'=>200,
											'message'=>'Sukses Login!',
											'data'=>$result2[0]
										);
										$this->session->set_userdata('id', $result2->id);
										$this->session->set_userdata('email', $result2->email);
										$this->session->set_userdata('namalengkap', $result2->namalengkap);
										$this->session->set_userdata('role', $result2->role);
										$this->session->set_userdata('status', 1);
										redirect(base_url("home"));
									}
									else{
										$return = array(
											'status'=>200,
											'message'=>'Data Tidak Ada!',
											'data'=>null
										);
									}
							} else {
								$return = array(
									'status'=>200,
									'message'=>'Password Salah!',
									'data'=>null
								);
							}
					} else {
						$return = array(
							'status'=>200,
							'message'=>'No HP Salah!',
							'data'=>null
						);
					}
			}
			echo json_encode($return, JSON_PRETTY_PRINT);
	}

	// public function login() {
	// 	$this->form_validation->set_rules('username', 'Username', 'required|min_length[4]|max_length[15]');
	// 	$this->form_validation->set_rules('password', 'Password', 'required');
	//
	// 	if ($this->form_validation->run() == TRUE) {
	// 		$username = trim($_POST['username']);
	// 		$password = trim($_POST['password']);
	//
	// 		$data = $this->M_auth->login($username, $password);
	//
	// 		if ($data == false) {
	// 			$this->session->set_flashdata('error_msg', 'Username / Password Anda Salah.');
	// 			redirect('Auth');
	// 		} else {
	// 			$session = [
	// 				'userdata' => $data,
	// 				'status' => "Loged in"
	// 			];
	// 			$this->session->set_userdata($session);
	// 			redirect('Home');
	// 		}
	// 	} else {
	// 		$this->session->set_flashdata('error_msg', validation_errors());
	// 		redirect('Auth');
	// 	}
	// }

	public function logout() {
		$this->session->sess_destroy();
		redirect('Auth');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
