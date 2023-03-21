<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/REST_Controller.php';

class Dashboard extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function stunting_bulanan_post(){
        $start    = (new DateTime('2022-01-01'))->modify('first day of this month');
        $end      = (new DateTime(date('Y-m-d')))->modify('first day of next month');
        $interval = DateInterval::createFromDateString('1 month');
        $period   = new DatePeriod($start, $interval, $end);

        foreach ($period as $dt) {
            $tahun_bulan = $dt->format("Y-m");

            $data_stunting = $this->_get_data_stunting_bulanan($tahun_bulan);

            $data[] = array('periode' => $tahun_bulan, 
                            'jumlah_data' => $data_stunting['jumlah_data'],
                            'jumlah_stunting' => $data_stunting['jumlah_stunting'],
                        );
        }
        $this->response(array("success" => true, "data" => $data), REST_Controller::HTTP_OK);
    }

    private function _get_data_stunting_bulanan($tahun_bulan){
        $q_stunting = $this->_q_stunting();
        $q_stunting = $this->_filter_wilayah_stutnting($q_stunting);

        $split = explode('-', $tahun_bulan);
        $bulan = $split[1];
        $tahun = $split[0];
        $jumlah_hari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
        $tgl_pengukuran    =   array (
                            'range' => 
                                array (
                                    'tgl_pengukuran' => 
                                        array (
                                            'gte' => $tahun_bulan.'-01',
                                            'lte' => $tahun_bulan.'-'.$jumlah_hari,
                                            'format' => 'yyyy-MM-dd',
                                        ),
                                ),
                        );
        array_push($q_stunting['query']['bool']['must'], $tgl_pengukuran);

        $json_stunting = json_encode($q_stunting, JSON_UNESCAPED_SLASHES);

        $jumlah_data = $this->elasticsearch->count('stunting*', $json_stunting);

        $q_stunting = $this->_filter_tbu_stunting($q_stunting);

        $json_stunting = json_encode($q_stunting, JSON_UNESCAPED_SLASHES);
        
        $jumlah_stunting = $this->elasticsearch->count('stunting*', $json_stunting);

        $data['jumlah_data'] = $jumlah_data['count'];
        $data['jumlah_stunting'] = $jumlah_stunting['count'];
        return $data;
    }

    private function _q_stunting(){
        $q_stunting = array (
                            'query' => array (
                                'bool' => 
                                    array (
                                        'must' => 
                                            array (
                                                // array (
                                                //     'exists' => array (
                                                //         'field' => 'tgl_pengukuran',
                                                //     ),
                                                // ),
                                            ),
                                        'filter' => 
                                            array (

                                            ),
                                    ),
                            ),
                    );
        return $q_stunting;
    }

    private function _filter_wilayah_stutnting($q_stunting){
        if ($this->input->post('no_kec')) {
            $no_kec = (int)$this->input->post('no_kec');

            $kec = array (
                    'term' => 
                        array (
                            'no_kec' => 
                                array (
                                    'value' => $no_kec,
                                ),
                        ),
                    );
            array_push($q_stunting['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel')) {
                $no_kel = (int)$this->input->post('no_kel');

                $kel = array (
                        'term' => 
                            array (
                                'no_kel' => 
                                    array (
                                        'value' => $no_kel,
                                    ),
                            ),
                        );
                array_push($q_stunting['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) {
            $no_rw = (int)$this->input->post('no_rw');
            $rw = array (
                    'term' => 
                        array (
                            'no_rw.keyword' => 
                                array (
                                    'value' => $no_rw,
                                ),
                        ),
                    );
            array_push($q_stunting['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt')) {
            $no_rt = (int)$this->input->post('no_rt');
            $rt = array (
                    'term' => 
                        array (
                            'no_rt.keyword' => 
                                array (
                                    'value' => $no_rt,
                                ),
                        ),
                    );
            array_push($q_stunting['query']['bool']['filter'], $rt);
        }

        return $q_stunting;
    }

    private function _filter_tbu_stunting($q_stunting){
        $q_stunting['query']['bool']['should'] = array(
            array(
                'match_phrase' => array('tb_u.keyword' => 'Pendek')
            ),
            array(
                'match_phrase' => array('tb_u.keyword' => 'Sangat Pendek')
            )
        );

        $q_stunting['query']['bool']['minimum_should_match'] = 1;
        return $q_stunting;
    }

    private function _filter_tahun_bulan_stunting($q_stunting){
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        if ($tahun) {
            if ($bulan) {
                $jumlah_hari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
                $tgl_pengukuran    =   array (
                            'range' => 
                                array (
                                    'tgl_pengukuran' => 
                                        array (
                                            'gte' => $tahun.'-'.$bulan.'-01',
                                            'lte' => $tahun.'-'.$bulan.'-'.$jumlah_hari,
                                            'format' => 'yyyy-MM-dd',
                                        ),
                                ),
                        );
                array_push($q_stunting['query']['bool']['must'], $tgl_pengukuran);
            }else{
                $tgl_pengukuran    =   array (
                            'range' => 
                                array (
                                    'tgl_pengukuran' => 
                                        array (
                                            'gte' => $tahun.'-01-01',
                                            'lte' => $tahun.'-12-31',
                                            'format' => 'yyyy-MM-dd',
                                        ),
                                ),
                        );
                array_push($q_stunting['query']['bool']['must'], $tgl_pengukuran);
            }
        }
        
        return $q_stunting;
    }

    public function count_data_kesehatan_post(){
        $data['jum_stunting'] = $this->_count_stunting();
        $data['jum_kia'] = 0;
        $data['jum_vaksin_18_min'] = $this->_count_vaksin('<18');
        $data['jum_vaksin_18_plus'] = $this->_count_vaksin('>18');
        // $data['jum_vaksin_dewasa'] = 0;
        $data['jum_imunisasi'] = 0;
        $data['jum_tb'] = 0;
        $data['jum_hiv'] = 0;

        $this->response(array("success" => true, "data" => $data), REST_Controller::HTTP_OK);
    }

    private function _count_stunting(){
        $q_stunting = $this->_q_stunting();
        $q_stunting = $this->_filter_wilayah_stutnting($q_stunting);
        $q_stunting = $this->_filter_tbu_stunting($q_stunting);
        $q_stunting = $this->_filter_tahun_bulan_stunting($q_stunting);
        $json_stunting = json_encode($q_stunting, JSON_UNESCAPED_SLASHES);
        $jumlah_stunting = $this->elasticsearch->count('stunting*', $json_stunting);
        return $jumlah_stunting['count'];
    }

    public function list_stunting_post(){
        $from = $this->input->post('from');
        $size = $this->input->post('size');
        $dataArr = array();

        $q_stunting = $this->_q_stunting();
        $q_stunting = $this->_filter_tbu_stunting($q_stunting);

        $json_stunting = json_encode($q_stunting, JSON_UNESCAPED_SLASHES);
        $count_all = $this->elasticsearch->count('stunting*', $json_stunting);

        $q_stunting = $this->_filter_wilayah_stutnting($q_stunting);
        $q_stunting = $this->_filter_tahun_bulan_stunting($q_stunting);

        if ($this->input->post('search')) {
            $search_val = $this->input->post('search');
            if (is_numeric($search_val)) {
                $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('nik.keyword'),
                            'query' => $search_val,
                          ),
                        );
            }else{
                $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('nama_lgkp.keyword'),
                            'query' => $search_val.'*',
                          ),
                        );
            }
            
            array_push($q_stunting['query']['bool']['must'], $search);
        }

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('id'),
                            'query' => $id,
                          ),
                        );
            array_push($q_stunting['query']['bool']['must'], $search);
        }

        $json_stunting = json_encode($q_stunting, JSON_UNESCAPED_SLASHES);
        $count_filtered = $this->elasticsearch->count('stunting*', $json_stunting);

        $q_stunting['from'] = $from;
        $q_stunting['size'] = $size;

        if ($this->input->post('sort')) {
            $sort = $this->input->post('sort');
            $order = $this->input->post('order');
            $q_stunting['sort'] = array (
                                        array (
                                            $sort => 
                                            array (
                                                'order' => $order,
                                            ),
                                        ),
                                    );
        }else{
            $q_stunting['sort'] = array (
                                        array (
                                            'nama_lgkp.keyword' => 
                                            array (
                                                'order' => 'asc',
                                            ),
                                        ),
                                    );
        }

        $json_stunting = json_encode($q_stunting, JSON_UNESCAPED_SLASHES);

        $data = $this->elasticsearch->advancedquery('stunting*', $json_stunting);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }

            $this->response(array("success" => true, "data" => $dataArr, 'count_all' => $count_all['count'], 'count_filtered' => $count_filtered['count']), REST_Controller::HTTP_OK);
        } else {
            $this->response(array("success" => false, "message" => "Record not Found!"), REST_Controller::HTTP_OK);
        }
    }

    private function _q_vaksin($kelompok_usia=null){
        $q_vaksin = array (
                            'query' => array (
                                'bool' => 
                                    array (
                                        'must' => 
                                            array (
                                                array (
                                                    'exists' => array (
                                                        'field' => 'id',
                                                    ),
                                                ),
                                            ),
                                        'filter' => 
                                            array (

                                            ),
                                    ),
                            ),
                        );
        return $q_vaksin;
    }

    private function _q_filter_wilayah_vaksin($q_vaksin){
        // if ($this->input->post('no_kec')) {
        //     $no_kec = (int)$this->input->post('no_kec');

        //     $kec = array (
        //             'term' => 
        //                 array (
        //                     'no_kec' => 
        //                         array (
        //                             'value' => $no_kec,
        //                         ),
        //                 ),
        //             );
        //     array_push($q_vaksin['query']['bool']['filter'], $kec);

        //     if ($this->input->post('no_kel')) {
        //         $no_kel = (int)$this->input->post('no_kel');

        //         $kel = array (
        //                 'term' => 
        //                     array (
        //                         'no_kel' => 
        //                             array (
        //                                 'value' => $no_kel,
        //                             ),
        //                     ),
        //                 );
        //         array_push($q_vaksin['query']['bool']['filter'], $kel);
        //     }
        // }

        // if ($this->input->post('no_rw')) {
        //     $no_rw = (int)$this->input->post('no_rw');
        //     $rw = array (
        //             'term' => 
        //                 array (
        //                     'no_rw.keyword' => 
        //                         array (
        //                             'value' => $no_rw,
        //                         ),
        //                 ),
        //             );
        //     array_push($q_vaksin['query']['bool']['filter'], $rw);
        // }

        // if ($this->input->post('no_rt')) {
        //     $no_rt = (int)$this->input->post('no_rt');
        //     $rt = array (
        //             'term' => 
        //                 array (
        //                     'no_rt.keyword' => 
        //                         array (
        //                             'value' => $no_rt,
        //                         ),
        //                 ),
        //             );
        //     array_push($q_vaksin['query']['bool']['filter'], $rt);
        // }

        return $q_vaksin;
    }

    private function _q_filter_kelompok_usia_vaksin($q_vaksin,$kelompok_usia=null){
        if ($this->input->post('kelompok_usia')) {
            $kelompok_usia = $this->input->post('kelompok_usia');
        }

        if ($kelompok_usia) {
            if ($kelompok_usia == '<18') {

                $kel_usia = array (
                    'term' => 
                        array (
                            'kelompok_usia.keyword' => 
                                array (
                                    'value' => '<18',
                                ),
                        ),
                    );
                array_push($q_vaksin['query']['bool']['filter'], $kel_usia);

            }else {
                $q_vaksin['query']['bool']['should'] = array(
                    array(
                        'match_phrase' => array('kelompok_usia.keyword' => '18-30')
                    ),
                    array(
                        'match_phrase' => array('kelompok_usia.keyword' => '31-45')
                    ),
                    array(
                        'match_phrase' => array('kelompok_usia.keyword' => '46-59')
                    ),
                    array(
                        'match_phrase' => array('kelompok_usia.keyword' => '>60')
                    )
                );

                $q_vaksin['query']['bool']['minimum_should_match'] = 1;
            }
            
        }

        return $q_vaksin;
    }

    private function _filter_tahun_bulan_vaksin($q_vaksin){
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        if ($tahun) {
            if ($bulan) {
                $jumlah_hari = cal_days_in_month(CAL_GREGORIAN,$bulan,$tahun);
                $tgl_uraian    =   array (
                            'range' => 
                                array (
                                    'tgl_uraian.keyword' => 
                                        array (
                                            'gte' => $tahun.'-'.$bulan.'-01',
                                            'lte' => $tahun.'-'.$bulan.'-'.$jumlah_hari,
                                            'format' => 'yyyy-MM-dd',
                                        ),
                                ),
                        );
                array_push($q_vaksin['query']['bool']['must'], $tgl_uraian);
            }else{
                $tgl_uraian    =   array (
                            'range' => 
                                array (
                                    'tgl_uraian.keyword' => 
                                        array (
                                            'gte' => $tahun.'-01-01',
                                            'lte' => $tahun.'-12-31',
                                            'format' => 'yyyy-MM-dd',
                                        ),
                                ),
                        );
                array_push($q_vaksin['query']['bool']['must'], $tgl_uraian);
            }
        }
        
        return $q_vaksin;
    }

    private function _count_vaksin($kelompok_usia=null){
        $q_vaksin = $this->_q_vaksin();
        $q_vaksin = $this->_q_filter_wilayah_vaksin($q_vaksin);
        $q_vaksin = $this->_q_filter_kelompok_usia_vaksin($q_vaksin,$kelompok_usia);
        $q_vaksin = $this->_filter_tahun_bulan_vaksin($q_vaksin);

        $json_vaksin = json_encode($q_vaksin, JSON_UNESCAPED_SLASHES);
        
        $jumlah_vaksin = $this->elasticsearch->count('t_profil_vaksin*', $json_vaksin);
        return $jumlah_vaksin['count'];
    }

    public function list_vaksin_post(){
        $from = $this->input->post('from');
        $size = $this->input->post('size');
        $dataArr = array();

        $q_vaksin = $this->_q_vaksin();

        $json_vaksin = json_encode($q_vaksin, JSON_UNESCAPED_SLASHES);
        $count_all = $this->elasticsearch->count('t_profil_vaksin*', $json_vaksin); 

        $q_vaksin = $this->_q_filter_wilayah_vaksin($q_vaksin);
        $q_vaksin = $this->_q_filter_kelompok_usia_vaksin($q_vaksin);
        $q_vaksin = $this->_filter_tahun_bulan_vaksin($q_vaksin);

        if ($this->input->post('search')) {
            $search_val = $this->input->post('search');
            if (is_numeric($search_val)) {
                $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('nik.keyword'),
                            'query' => $search_val,
                          ),
                        );
            }else{
                $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('nama_lgkp'),
                            'query' => $search_val.'*',
                          ),
                        );
            }
            
            array_push($q_vaksin['query']['bool']['must'], $search);
        }

        $json_vaksin = json_encode($q_vaksin, JSON_UNESCAPED_SLASHES);
        $count_filtered = $this->elasticsearch->count('t_profil_vaksin*', $json_vaksin);

        $q_vaksin['from'] = $from;
        $q_vaksin['size'] = $size;

        if ($this->input->post('sort')) {
            $sort = $this->input->post('sort');
            $order = $this->input->post('order');
            $q_vaksin['sort'] = array (
                                        array (
                                            $sort => 
                                            array (
                                                'order' => $order,
                                            ),
                                        ),
                                    );
        }else{
            $q_vaksin['sort'] = array (
                                        array (
                                            'nama_lgkp.keyword' => 
                                            array (
                                                'order' => 'asc',
                                            ),
                                        ),
                                    );
        }

        if ($this->input->post('id')) {
            $id = $this->input->post('id');
            $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('id'),
                            'query' => $id,
                          ),
                        );
            array_push($q_vaksin['query']['bool']['must'], $search);
        }

        $json_vaksin = json_encode($q_vaksin, JSON_UNESCAPED_SLASHES);

        $data = $this->elasticsearch->advancedquery('t_profil_vaksin*', $json_vaksin);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }

            $this->response(array("success" => true, "data" => $dataArr, 'count_all' => $count_all['count'], 'count_filtered' => $count_filtered['count']), REST_Controller::HTTP_OK);
        } else {
            $this->response(array("success" => false, "message" => "Record not Found!"), REST_Controller::HTTP_OK);
        }
    }
}
?>