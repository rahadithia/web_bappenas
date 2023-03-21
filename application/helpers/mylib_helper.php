<?php

function opendata($url, $post = array())
{
    $CI = &get_instance();
    $user = REST_U_OPENDATAV2;
    $pass = REST_P_OPENDATAV2;
    $link = $url;
    $CI->curl->create($link);
    $CI->curl->useragent('Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
    $CI->curl->http_login($user, $pass);
    if ($post) {
        $CI->curl->post($post);
    }
}

function opensikda($url, $post = array())
{
    $CI = &get_instance();
    $user = REST_U_OPENSIKDA;
    $pass = REST_P_OPENSIKDA;
    $link = $url;
    $CI->curl->create($link);
    $CI->curl->useragent('Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
    $CI->curl->http_login($user, $pass);
    if ($post) {
        $CI->curl->post($post);
    }
}

function service_tlive($url, $post = array())
{
    $CI = &get_instance();
    $user = REST_U_TLIVE;
    $pass = REST_P_TLIVE;
    $link = $url;
    $CI->curl->create($link);
    $CI->curl->useragent('Mozilla/5.0 (Windows NT 5.1; rv:31.0) Gecko/20100101 Firefox/31.0');
    $CI->curl->http_login($user, $pass);
    if ($post) {
        $CI->curl->post($post);
    }
}

function service_pegawai_by_nip($nip)
{
    $CI = &get_instance();
    $url = 'https://opendatav2.tangerangkota.go.id/services/pegawai/pegawaibynip/nip/' . $nip . '/format/json';
    opendata($url);
    $data = json_decode($CI->curl->execute(), true);
    return $data;
}

function service_pegawai_by_id($id_pegawai)
{
    $CI = &get_instance();
    $url = 'https://opendatav2.tangerangkota.go.id/services/pegawai/ini_pegawai/idd/' . $id_pegawai . '/format/json';
    opendata($url);
    $data = json_decode($CI->curl->execute(), true);
    return $data;
}

function service_foto_pegawai($nip, $id_pegawai)
{
    $CI = &get_instance();
    $url = 'https://opendatav2.tangerangkota.go.id/services/pegawai/ini_pegawai_foto/idd/' . $id_pegawai . '/format/json';
    opendata($url);
    $result = json_decode($CI->curl->execute(), true);
    $src_foto_pegawai = 'https://simasn.tangerangkota.go.id/apps/assets/media/file/' . $nip . '/pasfoto/' . $result['file_dokumen'];
    return $src_foto_pegawai;
}

function isLogin()
{
    $CI = get_instance();
    if (($CI->session->userdata('logged_in'))) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function isSuper()
{
    $CI = get_instance();
    if (($CI->session->userdata('level_user') == 1)) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function isAdminOpd()
{
    $CI = get_instance();
    if (($CI->session->userdata('level_user') == '')) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function flash_message($type, $message)
{
    $CI = get_instance();
    $alert = '<div class="alert border-0 bg-light-' . $type . ' alert-dismissible fade show">
        <div class="text-' . $type . '">' . $message . '</div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    return $CI->session->set_flashdata('message', $alert);
}

function header_excel($namaFile)
{
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");

    // header untuk nama file
    header("Content-Disposition: attachment; filename=" . $namaFile . ".xls");
    header("Content-Transfer-Encoding: binary ");
}

function header_word($namafile)
{
    header("Content-type: application/vnd.ms-word");
    header("Content-Disposition: attachment;Filename=" . $namafile . ".doc");
}

function nama_pegawai_gelar($nama_pegawai, $gelar_depan = null, $gelar_belakang = null)
{
    if ($gelar_depan === '-' || $gelar_depan === '' || $gelar_depan === null) {
        $nama_pegawai_gelar = $nama_pegawai . ', ' . $gelar_belakang;
    } else {
        $nama_pegawai_gelar = $gelar_depan . '. ' . $nama_pegawai . ', ' . $gelar_belakang;
    }

    return $nama_pegawai_gelar;
}

function formatRupiah($data)
{
    if ($data) {
        if (is_numeric($data)) return "Rp. " . number_format($data, 2);
        else return $data;
    }
    return "Rp. " . number_format(0, 2);
}

function readMore($text, $length, $mode = 2)
{
    $text = strip_tags($text);
    $jumlah_kata = strlen($text);
    if ($jumlah_kata <= $length) {
        return $text;
    } else {
        if ($mode != 1) {
            $char = $text{
                $length - 1};
            switch ($mode) {
                case 2:
                    while ($char != ' ') {
                        $char = $text{
                            --$length};
                    }
                case 3:
                    while ($char != ' ') {
                        $char = $text{
                            ++$num_char};
                    }
            }
        }
        return substr($text, 0, $length) . ' ...';
    }
}

function get_m_prop()
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('master_prop');
    $ci->db->order_by('NO_PROP', 'ASC');
    return $ci->db->get()->result();
}

function get_m_kab($no_prop = null)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('master_kab');
    if ($no_prop) {
        $ci->db->where('NO_PROP', $no_prop);
    }
    $ci->db->order_by('NO_KAB', 'ASC');
    return $ci->db->get()->result();
}

function get_m_kec($no_prop = null, $no_kab = null)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('master_kec');
    if ($no_prop && $no_kab) {
        $ci->db->where('NO_PROP', $no_prop);
        $ci->db->where('NO_KAB', $no_kab);
    }
    $ci->db->order_by('NO_KEC', 'ASC');
    return $ci->db->get()->result();
}

function get_m_kel($no_prop = null, $no_kab = null, $no_kec = null)
{
    $ci = get_instance();
    $ci->db->select('*');
    $ci->db->from('master_kel');
    if ($no_prop && $no_kab && $no_kec) {
        $ci->db->where('NO_PROP', $no_prop);
        $ci->db->where('NO_KAB', $no_kab);
        $ci->db->where('NO_KEC', $no_kec);
    }
    $ci->db->order_by('NO_KEL', 'ASC');
    return $ci->db->get()->result();
}
