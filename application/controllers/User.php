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
		$data['isi'] = $this->db->get('user');//membuka tabel user dan mengambil data tiap field dan ditampung di variabel isi
		$this->load->view('form/views' , $data);//membuka form index dan memasukkan variabel data
	}

	// Add a new item
	public function add()
	{
		$this->load->view('form/tambah');//memanggil form untuk input data yg berada di folder user
	}

	public function masukkan()
	{
		# code...
		$input = array('username' => $this->input->post('username'),'password' => $this->input->post('password'),'fullname' => $this->input->post('fullname'),'level' => $this->input->post('level'));//data inputan dari form disimpan ke dalam array

		$insert=$this->db->insert('user' , $input );//data inputan yg disimpan dimasukkan ke dalam tabel user

		if ($insert) {


            redirect('User');//jika proses memasukkan berhasil maka prin sukses dan sebaliknya

        } else {

            echo "gagal";

        }
	}
	//Update one item
	public function update($id = '')//mengambil sebuah value dari link localhost/.....
	{
		
			# code...
			$this->db->where('id',$id);//memasukkan id yg tadi sudah ditentukan lalu memilih id trsb

			$data['isi'] = $this->db->get('user');//mengambil tabel user

			$this->load->view('form/update',$data);//meload form update untuk update file
		
	}

	public function gantikan( $id = '')
	{
		# code...
		$input = array('username' => $this->input->post('username'),'password' => $this->input->post('password'),'fullname' => $this->input->post('fullname'),'level' => $this->input->post('level'));//menampung data update tadi kedalam array
		$this->db->where('id',$id);//memasukkan id yg tadi sudah ditentukan lalu memilih id trsb
		$insert=$this->db->update('user' , $input );//memasukkan data tai ke dalam tabel user

		if ($insert) {


            redirect('User');

        } else {

            echo "gagal";

        }

	}

	//Delete one item
	public function delete( $id = '' )//mengambil id yg tadi sudah dipilih
	{  
		$this->db->where('id',$id);//memasukkan id yg sudah dipilih dan menentukan id mana yg akan dihapus

			$this->db->delete('user');//menghapus tabel /id yg sudah dipilih

			redirect('User','refresh');//kembali ke controller User dan melakukan refresh page

		/*if($this->input->post('submit'))
		{

			$id = $this->input->post('id');

			$this->db->where('id',$id);

			$this->db->delete('user');

			redirect('User','refresh');
		}*/
	}

	/*public function update2()//belum jadi
	{
		if ($this->input->post('submit')) {
			# code...
			$id = $this->input->post('id');

			$this->db->where('id',$id);

			$data['isi'] = $this->db->get('user');

			$this->load->view('form/update2',$data);
		}
	}

	public function gantikan2()//belum jadi
	{
		
		
		if ($this->input->post('submit'))
		{
			# code...
			

			$input = array('username' => $this->input->post('username'),'password' => $this->input->post('password'),'fullname' => $this->input->post('fullname'),'level' => $this->input->post('level'));

			$id = $this->input->post('id');
			$this->db->where('id',$id);

			$this->db->update('user' , $input );//

			redirect('User','refresh');
		}
		
	}*/

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

	public function login()
	{
		if (condition) {
			# code...
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
