<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/Non_auth.php';

class Data_pendaftar extends Non_auth
{
	function __construct()
	{
		parent::__construct();
	}

	public function index_get()
	{
		echo "success";
	}

	function data_pendaftar_get()
	{
		$this->db->select('a.*,b.*');
		$this->db->from('t_pendaftar a');
		$this->db->join('m_jenis_kelamin b', 'b.id_jk=a.jenis_kelamin');
		$this->db->order_by('a.id_pendaftar', 'DESC');
		$pendaftar = $this->db->get()->result();

		if ($pendaftar) {
			$result = array('success' => true, 'message' => 'Data ditemukan', 'pendaftar' => $pendaftar);
			$this->response($result, 200);
		} else {
			$result = array('success' => false, 'message' => 'Data tidak ditemukan');
			$this->response($result, 404);
		}
	}
}
