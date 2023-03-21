<?php
class Pendaftaran extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model_pendaftaran');
    }

    function index()
    {
        $data['title'] = 'Data Pendaftar';
        $this->template->load('template', 'list', $data);
    }


    public function ajax_list()
    {
        $number = 1;
        $data_krt = $this->model_pendaftaran->get_data();

        $data = array();
        foreach ($data_krt as $row) {
            $row->no = $number;
            $row->tanggal_lhr_indo = tanggal_indo($row->tanggal_lhr);
            $row->foto = '<img src="assets/img/upload/' . $row->path_foto . '" alt="" width="100%;">';
            $row->aksi = '
                <div style="text-align:right">
                    <a class="btn btn-warning btn-sm" href="javascript:void(0)" onclick="edit(' . $row->id_pendaftar . ')" title="Ubah"><i class="bi bi-pencil-fill"></i></a>
                    <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="del(' . $row->id_pendaftar . ')" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                    </div>
                    ';

            $data[] = $row;
            $number++;
        }

        $output = array(
            'recordsTotal' => $this->model_pendaftaran->count_all(),
            'recordsFiltered' => count($data),
            'data' => $data
        );
        //output to json format
        echo json_encode($output);
    }

    public function ajax_edit($id_pendaftar)
    {
        $data = $this->model_pendaftaran->get_data_detail($id_pendaftar);
        if ($data) {
            $dt['status'] = TRUE;
            $dt['data'] = $data;
        } else {
            $dt['status'] = FALSE;
        }
        echo json_encode($dt);
    }

    function ajax_insert()
    {
        $this->_validate('add');
        $data = array(
            'nama' => $this->input->post('nama', true),
            'tempat_lhr' => $this->input->post('tempat_lhr', true),
            'tanggal_lhr' => $this->input->post('tanggal_lhr', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'path_foto' => $this->input->post('nama_foto_banner_get', true),
            'created_at' => date('Y-m-d'),

        );
        $this->db->insert('t_pendaftar', $data);
        $id_krt = $this->db->insert_id();

        // var_dump($id_krt);
        // die;
        if ($id_krt) {
            $res['status'] = true;
        } else {
            $res['status'] = false;
        }
        echo json_encode($res);
    }

    public function ajax_update()
    {
        $this->_validate('update');
        $id_pendaftar = $this->input->post('id_pendaftar', true);
        $data = array(
            'nama' => $this->input->post('nama', true),
            'tempat_lhr' => $this->input->post('tempat_lhr', true),
            'tanggal_lhr' => $this->input->post('tanggal_lhr', true),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', true),
            'alamat' => $this->input->post('alamat', true),
            'email' => $this->input->post('email', true),
            'no_tlp' => $this->input->post('no_tlp', true),
            'path_foto' => $this->input->post('nama_foto_banner_get', true),
            'updated_at' => date('Y-m-d h:i:s'),
        );

        $update = $this->db->update('t_pendaftar', $data, array('id_pendaftar' => $id_pendaftar));;

        if ($update) {
            $res['status'] = true;
        } else {
            $res['status'] = false;
        }
        echo json_encode($res);
    }

    public function ajax_delete($id)
    {
        $this->model_pendaftaran->delete($id);
        echo json_encode(array('status' => TRUE));
    }

    public function upload_foto()
    {
        if (!empty($_FILES['file']['name'])) {

            $config['upload_path']          = './assets/img/upload';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['max_size']             = 6000;
            $config['file_name']            = round(microtime(true) * 1000);

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {
                $data['inputerror'][] = 'file';
                $data['error_string'][] = 'Terjadi kesalahan : ' . $this->upload->display_errors('', '');
                $data['status'] = FALSE;
                echo json_encode($data);
                exit();
            } else {
                $f_name = $this->upload->data('file_name');
                $data['status'] = TRUE;
                $data['file'] = $f_name;
            }
        } else {
            $data['error_string'][] = 'Terjadi kesalahan : Tidak ada file yang dipilih ! ';
            $data['status'] = FALSE;
        }

        echo json_encode($data);
    }

    private function _validate($param = null)
    {
        $this->load->library('form_validation');
        $this->config->set_item('language', 'indonesian');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('tempat_lhr', 'Tempat Lahir', 'trim|required');
        $this->form_validation->set_rules('tanggal_lhr', 'Tanggal Lahir', 'trim|required');
        $this->form_validation->set_rules('nama_jk', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_tlp', 'No Telp', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('nama_foto_banner_get', 'Foto', 'trim|required');

        if ($this->form_validation->run()) return TRUE;

        if (form_error('nama')) $error[] = 'nama';
        if (form_error('tempat_lhr')) $error[] = 'tempat_lhr';
        if (form_error('tanggal_lhr')) $error[] = 'tanggal_lhr';
        if (form_error('nama_jk')) $error[] = 'nama_jk';
        if (form_error('alamat')) $error[] = 'alamat';
        if (form_error('no_tlp')) $error[] = 'no_tlp';
        if (form_error('email')) $error[] = 'email';
        if (form_error('nama_foto_banner_get')) $error[] = 'nama_foto_banner_get';

        if ($error) {
            foreach ($error as $err) {
                $data['error_class'][$err] = 'is-invalid';
                $data['error_class_feedback'][$err] = 'invalid-feedback';
                $data['error_string'][$err] = form_error($err);
            }
            $data['status'] = FALSE;
            echo json_encode($data);
            exit();
        }
    }

    public function ajax_data()
    {
        $type = $this->input->post('type');
        switch ($type) {
            case 'jenis_kelamin':
                $data = $this->db->get('m_jenis_kelamin')->result();
                if ($data) {
                    $res['status'] = TRUE;
                    $res['data'] = $data;
                } else {
                    $res['status'] = FALSE;
                }

                echo json_encode($res);
                break;

            default:
                echo json_encode(array('status' => false));
                break;
        }
    }
}
