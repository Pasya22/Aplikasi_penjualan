<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('MSudi');
		$this->load->helper(array('file', 'form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{

		$data['title'] = 'Home';
		$this->load->view('temp/header', $data);
		$this->load->view('Penjualan/VHome', $data);
		$this->load->view('temp/footer', $data);
	}
	// Menampilkan  Data Barang 
	public function DataBrg()
	{
		$data = [
			'title' => 'Data Barang',
			'tampil' => $this->MSudi->GetData('t_penjualan'),
		];
		$this->load->view('temp/header', $data);
		$this->load->view('Penjualan/VDataBrg', $data);
		$this->load->view('temp/footer', $data);
	}
	// Form Tambah Data Barang
	public function VFormAddDataBrg()
	{

		$data['title'] = 'Form Add Data Barang';
		$this->load->view('Penjualan/VFormAddDataBrg', $data);
	}
	// form Edit Data Barang
	public function VFormEditDataBrg()
	{
		$id = $this->uri->segment(3);
		$data = [
			'title' => 'Form Edit Data Barang',
			'tampil2' => $this->MSudi->GetDataWhere('t_penjualan', 'id', $id)->row(),
		];
		$this->load->view('Penjualan/VFormEditDataBrg', $data);
	}
	//  Eksekusi atau Aksi Menambahkan  Data Barang 
	public function AddDataBrg()
	{
		// Library atau eksekusi upload file
		$config['upload_path']          = './foto/';
		$config['allowed_types']        = 'jpg|png|PNG|JPG';
		$config['max_size']             = 100;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('foto_brg')) {
			// $this->load->library('session');
			echo json_encode(array('status' => 'error'));
			$this->session->set_flashdata('msg', '<div class="alert alert-warning" role="alert">
			upload maximum 100KB 								
		</div>');
			redirect(site_url('Welcome/DataBrg'));
		} else {
			// eksekusi post data barang
			$foto_brg = $this->upload->data();
			$foto_brg = $foto_brg['file_name'];
			$nama_brg = $this->input->post('nama_brg');
			$harga_beli = $this->input->post('harga_beli');
			$harga_jual = $this->input->post('harga_jual');
			$stok = $this->input->post('stok');

			$add = array(
				'nama_brg' => $nama_brg,
				'harga_beli' => $harga_beli,
				'harga_jual' => $harga_jual,
				'stok' => $stok,
				'foto_brg' => $foto_brg
			);
			echo json_encode(array('status' => 'success'));
			// $this->load->library('session');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Sudah Masuk 								
			</div>');
			// eksekusi input data barang ke database
			$this->MSudi->AddData('t_penjualan', $add);
			redirect(site_url('Welcome/DataBrg'));
		}
	}
	//  Eksekusi atau Aksi Mengubah  Data Barang 
	public function EditDataBrg()
	{
		$id = $this->uri->segment(3);
		$update['nama_brg'] = $this->input->post('nama_brg');
		$update['harga_beli'] = $this->input->post('harga_beli');
		$update['harga_jual'] = $this->input->post('harga_jual');
		$update['stok'] = $this->input->post('stok');
		$up_file = $this->file_upload_user('./foto/');
		if ($up_file) {

			$update['foto_brg'] = $up_file;
		}
		$this->session->set_flashdata('msgEdit', '<div class="alert alert-success" role="alert">
			Data Berhasil di Update/Ubah							
		</div>');

		$this->MSudi->UpdateData('t_penjualan', 'id', $id, $update);
		redirect(site_url('Welcome/DataBrg'));
	}
	//  Eksekusi atau Aksi Menghapus  Data Barang 
	public function DeleteDataBrg()
	{
		if ($id = $this->uri->segment('3')) {
			$this->session->set_flashdata('msgDel', ' <div class="alert alert-success" role="alert">
			Data Berhasil Dihapus
		</div>');
			$this->MSudi->DeleteData('t_penjualan', 'id', $id);
			redirect(site_url('Welcome/DataBrg'));
		}
	}
	public function file_upload_user($dir = null)
	{
		$config['upload_path'] = $dir;
		$config['allowed_types'] = 'jpg|png|JPG|PNG';
		$config['max_size'] = 100;


		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto_brg')) {
			echo "gagal";
		} else {
			$upload_data = $this->upload->data();
			$file_name = $upload_data['file_name'];
			return $file_name;
		}
	}
}