<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Load Dependencies

	}

	// List all your items
	public function index()
	{
		$data['isi'] = $this->db->get('user');
		$this->load->view('form/views' , $data);
	}

	// Add a new item
	public function add()
	{
		$this->load->view('form/tambah');
	}

	public function masukkan()
	{
		# code...
		$input = array('username' => $this->input->post('username'),'password' => $this->input->post('password'),'fullname' => $this->input->post('fullname'),'level' => $this->input->post('level'));

		$insert=$this->db->insert('user' , $input );

		if ($insert) {


            redirect('User');

        } else {

            echo "gagal";

        }
	}
	//Update one item
	public function update($id = '')
	{
		
			# code...
			$this->db->where('id',$id);

			$data['isi'] = $this->db->get('user');

			$this->load->view('form/update',$data);//meload form update untuk update file
		
	}

	public function gantikan( $id = '')
	{
		# code...
		$input = array('username' => $this->input->post('username'),'password' => $this->input->post('password'),'fullname' => $this->input->post('fullname'),'level' => $this->input->post('level'));
		$this->db->where('id',$id);
		$insert=$this->db->update('user' , $input );

		if ($insert) {


            redirect('User');

        } else {

            echo "gagal";

        }

	}

	//Delete one item
	public function delete( $id = '' )//mengambil id yg tadi sudah dipilih
	{  
		$this->db->where('id',$id);

			$this->db->delete('user');

			redirect('User','refresh');//kembali ke controller User dan melakukan refresh page

	}


	public function delete2()
	{  

		if($this->input->post('submit'))
		{

			$id = $this->input->post('id');

			$this->db->where('id',$id);

			$this->db->delete('user');

			redirect('User','refresh');
		}
	}

	public function update2()//belum jadi
	{
		if ($this->input->post('submit')) {
			# code...
			$id = $this->input->post('id');

			$this->db->where('id',$id);

			$data['isi'] = $this->db->get('user');

			$this->load->view('form/update',$data);
		}
	}

	public function gantikan2($id = '')//belum jadi
	{
		
		
		if ($this->input->post('kirim'))
		{
			# code...
			$input = array('username' => $this->input->post('username'),'password' => $this->input->post('password'),'fullname' => $this->input->post('fullname'),'level' => $this->input->post('level'));


			$this->Model_user->ganti($input,$id);
			
		}		
	}
	public function Login()
	{
		# code...
		$this->load->view('form/Login');
	}

	public function login_action($value='')//njir gurung dadi salah cuk tulung benahi ya seng bisa
	{
		# code...
		$login = array('username' => $this->input->post('username'),
					   'password' => $this->input->post('password'));

		$cek = $this->Model_user->login("user",$login)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'nama' => $this->input->post('username'),
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);

			echo "Selamat Datang ";
 
			//redirect(base_url("user"));
		}
		else{
			echo "Username dan password salah !";
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
