<?php
class Model_pendaftaran extends Ci_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data()
    {
        $this->db->select('a.*,b.*');
        $this->db->from('t_pendaftar a');
        $this->db->join('m_jenis_kelamin b', 'b.id_jk=a.jenis_kelamin');

        if ($this->input->post('nama')) {
            $this->db->like('a.nama', $this->input->post('nama'));
        }
        if ($this->input->post('alamat')) {
            $this->db->like('a.alamat', $this->input->post('alamat'));
        }
        if ($this->input->post('tempat_lhr')) {
            $this->db->like('a.tempat_lhr', $this->input->post('tempat_lhr'));
        }
        if ($this->input->post('tanggal_lhr')) {
            $this->db->like('a.tanggal_lhr', $this->input->post('tanggal_lhr'));
        }
        if ($this->input->post('no_tlp')) {
            $this->db->where('a.no_tlp', $this->input->post('no_tlp'));
        }
        if ($this->input->post('jenis_kelamin')) {
            $this->db->where('a.jenis_kelamin', $this->input->post('jenis_kelamin'));
        }
        if ($this->input->post('email')) {
            $this->db->where('a.email', $this->input->post('email'));
        }

        $this->db->order_by('a.id_pendaftar', 'DESC');

        $query = $this->db->get()->result();
        return $query;
    }

    public function count_all()
    {
        $this->db->from('t_pendaftar');
        return $this->db->count_all_results();
    }

    public function get_data_detail($id_pendaftar)
    {
        $this->db->from('t_pendaftar');
        $this->db->where('id_pendaftar', $id_pendaftar);
        $query = $this->db->get();
        return $query->row();
    }

    function delete($id)
    {
        $this->db->where('id_pendaftar', $id);
        $this->db->delete('t_pendaftar');
        return true;
    }
}
