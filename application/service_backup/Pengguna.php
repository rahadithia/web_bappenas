<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . 'third_party/phpseclib/Net/SFTP.php';
require APPPATH . '../assets/compress_image/autoload.php';

class Pengguna extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // public function list_post()
    // {
    //     $from = $this->input->post('from');
    //     $size = $this->input->post('size');
    //     $dataArr = array();
    //     $q_list_pengguna = array (
    //             'query' => array (
    //                 'bool' => 
    //                     array (
    //                         'must' => 
    //                             array (
    //                                 array (
    //                                     'exists' => array (
    //                                         'field' => 'nama_kec.keyword',
    //                                     ),
    //                                 ),
    //                             ),

    //                     ),
    //             ),
    //         );

    //     $count_all = $this->elasticsearch->count('satudata*', json_encode($q_list_pengguna));
        
    //     if ($this->input->post('no_kec')) {
    //         $no_kec = (int)$this->input->post('no_kec');
    //         $kec = array (
    //                 'term' => 
    //                     array (
    //                         'no_kec' => 
    //                             array (
    //                                 'value' => $no_kec,
    //                             ),
    //                     ),
    //                 );
    //         array_push($q_list_pengguna['query']['bool']['must'], $kec);

    //         if ($this->input->post('no_kel')) {
    //             $no_kel = (int)$this->input->post('no_kel');
    //             $kel = array (
    //                     'term' => 
    //                         array (
    //                             'no_kel' => 
    //                                 array (
    //                                     'value' => $no_kel,
    //                                 ),
    //                         ),
    //                     );
    //             array_push($q_list_pengguna['query']['bool']['must'], $kel);
    //         }
    //     }

    //     if ($this->input->post('no_rw')) {
    //         $no_rw = (int)$this->input->post('no_rw');
    //         $rw = array (
    //                 'term' => 
    //                     array (
    //                         'no_rw' => 
    //                             array (
    //                                 'value' => $no_rw,
    //                             ),
    //                     ),
    //                 );
    //         array_push($q_list_pengguna['query']['bool']['must'], $rw);
    //     }

    //     if ($this->input->post('no_rt')) {
    //         $no_rt = (int)$this->input->post('no_rt');
    //         $rt = array (
    //                 'term' => 
    //                     array (
    //                         'no_rt' => 
    //                             array (
    //                                 'value' => $no_rt,
    //                             ),
    //                     ),
    //                 );
    //         array_push($q_list_pengguna['query']['bool']['must'], $rt);
    //     }

    //     // if ($this->input->post('kategori')) {
    //     //     if ($this->input->post('subkategori')) {
                
    //     //     }else{
    //     //         $kategori = $this->input->post('kategori');
    //     //         if ($kategori == 'bantuan') {
                    
    //     //         }
    //     //     }
    //     // }

    //     // if ($this->input->post('search')) {
    //     //     $search_val = $this->input->post('search');
    //     //     $q_list_pengguna['query']['bool']['should'] = 
    //     //                     array (
    //     //                         array (
    //     //                             'term' => 
    //     //                                 array (
    //     //                                     'nik.keyword' => 
    //     //                                         array (
    //     //                                             'value' => strtoupper($search_val),
    //     //                                         ),
    //     //                                 ),
    //     //                         ),
    //     //                     );
    //     // }

    //     $count_filtered = $this->elasticsearch->count('satudata*', json_encode($q_list_pengguna));

    //     $q_list_pengguna['from'] = $from;
    //     $q_list_pengguna['size'] = $size;

    //     $q_list_pengguna['sort'] = array (
    //                                 array (
    //                                     'nama_lgkp.keyword' => 
    //                                     array (
    //                                         'order' => 'asc',
    //                                     ),
    //                                 ),
    //                             );

    //     $list_pengguna = json_encode($q_list_pengguna);

    //     // echo $list_pengguna; die;

    //     $data = $this->elasticsearch->advancedquery('satudata*', $list_pengguna);

    //     if (isset($data['hits']['hits'][0])) {
    //         foreach($data['hits']['hits'] as $key=>$row){
    //             $dataArr[] = $row["_source"];
    //         }
    //         // var_dump($dataArr);die;
    //         $data_pengguna = json_encode(array("success" => true, "data" => $dataArr, 'count_all' => $count_all['count'], 'count_filtered' => $count_filtered['count']));
    //     } else {
    //         $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
    //     }
    //     echo $data_pengguna;
    // }

    public function list_post()
    {
        $from = $this->input->post('from');
        $size = $this->input->post('size');
        $dataArr = array();

        $q_list_pengguna = array (
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                        'exists' => array (
                                            'field' => 'nama_kec.keyword',
                                        ),
                                    ),
                                ),
                            'filter' => 
                                array (

                                ),
                        ),
                ),
            );

        $count_all = $this->elasticsearch->count('satudata*', json_encode($q_list_pengguna));
        
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
            array_push($q_list_pengguna['query']['bool']['filter'], $kec);

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
                array_push($q_list_pengguna['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) {
            $no_rw = (int)$this->input->post('no_rw');
            $rw = array (
                    'term' => 
                        array (
                            'no_rw' => 
                                array (
                                    'value' => $no_rw,
                                ),
                        ),
                    );
            array_push($q_list_pengguna['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt')) {
            $no_rt = (int)$this->input->post('no_rt');
            $rt = array (
                    'term' => 
                        array (
                            'no_rt' => 
                                array (
                                    'value' => $no_rt,
                                ),
                        ),
                    );
            array_push($q_list_pengguna['query']['bool']['filter'], $rt);
        }

        if ($this->input->post('kategori')) {
            if ($this->input->post('subkategori')) {
                $subkategori = $this->input->post('subkategori');
                $subkategori = json_decode($subkategori,true);
                // echo json_encode($subkategori); die();
                $subkat_bool = array (
                      'bool' => 
                      array (
                        'should' => 
                        array (
                          
                        ),
                      ),
                    );

                foreach ($subkategori as $s) {
                    if ($s == 'dtks') {
                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_bansosbpnt',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);

                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_bansospkh',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);

                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_pbijkn',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);
                    }elseif ($s == 'bpum') {
                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_bpum',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);
                    }elseif ($s == 'rtlh') {
                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_rtlh',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);
                    }elseif ($s == 'tangerang_cerdas') {
                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_tangerangcerdas',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);
                    }elseif ($s == 'bantuan_isoman') {
                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_bantuanisoman',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);
                    }elseif ($s == 'keamanan_pangan') {
                        $subkat = array (
                                    'exists' => 
                                    array (
                                      'field' => 'uraian_sikasep',
                                    ),
                                  );

                        array_push($subkat_bool['bool']['should'], $subkat);
                    }
                }

                array_push($q_list_pengguna['query']['bool']['filter'], $subkat_bool);
            }else{
                $kategori = $this->input->post('kategori');
                if ($kategori == 'bantuan') {
                    $kat = array (
                          'bool' => 
                          array (
                            'should' => 
                            array (
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_bansosbpnt',
                                ),
                              ),
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_bansospkh',
                                ),
                              ),
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_pbijkn',
                                ),
                              ),
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_bpum',
                                ),
                              ),
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_rtlh',
                                ),
                              ),
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_tangerangcerdas',
                                ),
                              ),
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_bantuanisoman',
                                ),
                              ),
                            ),
                          ),
                        );

                    array_push($q_list_pengguna['query']['bool']['filter'], $kat);
                }elseif ($kategori == 'jobfair') {
                    $kat = array (
                          'bool' => 
                          array (
                            'should' => 
                            array (
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_jobfair',
                                ),
                              ),
                            ),
                          ),
                        );

                    array_push($q_list_pengguna['query']['bool']['filter'], $kat);
                }elseif ($kategori == 'vaksinasi_covid19') {
                    $kat = array (
                          'bool' => 
                          array (
                            'should' => 
                            array (
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_vaksin',
                                ),
                              ),
                            ),
                          ),
                        );

                    array_push($q_list_pengguna['query']['bool']['filter'], $kat);
                }elseif ($kategori == 'riwayat_covid19') {
                    $kat = array (
                          'bool' => 
                          array (
                            'should' => 
                            array (
                              array (
                                'exists' => 
                                array (
                                  'field' => 'uraian_covid',
                                ),
                              ),
                            ),
                          ),
                        );

                    array_push($q_list_pengguna['query']['bool']['filter'], $kat);
                }
            }
        }

        if ($this->input->post('search')) {
            $search_val = $this->input->post('search');
            if (is_numeric($search_val)) {
                $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('nik','no_kk'),
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
            
            array_push($q_list_pengguna['query']['bool']['must'], $search);
        }

        $count_filtered = $this->elasticsearch->count('satudata*', json_encode($q_list_pengguna));

        $q_list_pengguna['from'] = $from;
        $q_list_pengguna['size'] = $size;

        if ($this->input->post('sort')) {
            $sort = $this->input->post('sort');
            $order = $this->input->post('order');
            $q_list_pengguna['sort'] = array (
                                        array (
                                            $sort => 
                                            array (
                                                'order' => $order,
                                            ),
                                        ),
                                    );
        }else{
            $q_list_pengguna['sort'] = array (
                                        array (
                                            'nama_lgkp.keyword' => 
                                            array (
                                                'order' => 'asc',
                                            ),
                                        ),
                                    );
        }

        $list_pengguna = json_encode($q_list_pengguna);

        $data = $this->elasticsearch->advancedquery('satudata*', $list_pengguna);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr, 'count_all' => $count_all['count'], 'count_filtered' => $count_filtered['count']));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function detail_profil_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_pengguna = json_encode(
            array (
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'nama_lgkp.keyword' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('satudata*', $list_pengguna);
        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_anggota_kk_post()
    {
        $no_kk = $this->input->post('no_kk');
        $dataArr = array();
        $list_pengguna = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'no_kk' => 
                                                array (
                                                    'value' => $no_kk,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'id_stat_hbkel' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('satudata*', $list_pengguna);
        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_riwayat_covid_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_covid = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'tgl_uraian' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_covid*', $list_covid);
        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_vaksin_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_vaksin = json_encode(
            array (
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'dosis.keyword' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_vaksin*', $list_vaksin);
        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_riwayat_jobfair_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_jobfair = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'tgl_uraian' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );

        $data = $this->elasticsearch->advancedquery('t_profil_jobfair*', $list_jobfair);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_tangcer_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_tangcer = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'id' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_tangcer*', $list_tangcer);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_rtlh_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_rtlh = json_encode(
            array (
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'id' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_rtlh*', $list_rtlh);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_bpum_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_bpum = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'id' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_bpum*', $list_bpum);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_blk_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_blk = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'cdd' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_blk_pendaftaran*', $list_blk);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_hibah_umkm_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_umkm = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'cdd' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_data_umkm_2021*', $list_umkm);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_sikasep_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_sikasep = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'id' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_sikasep*', $list_sikasep);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function list_cakapkerja_post()
    {
        $nik = $this->input->post('nik');
        $dataArr = array();
        $list_cakapkerja = json_encode(
            array (
                'size' => 10000,
                'query' => array (
                    'bool' => 
                        array (
                            'must' => 
                                array (
                                    array (
                                    'term' => 
                                        array (
                                            'nik.keyword' => 
                                                array (
                                                    'value' => $nik,
                                                ),
                                        ),
                                    ),
                                ),
                        ),
                ),
                'sort' => array (
                    array (
                        'id' => 
                        array (
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_cakapkerja*', $list_cakapkerja);

        if (isset($data['hits']['hits'][0])) {
            foreach($data['hits']['hits'] as $key=>$row){
                $dataArr[] = $row["_source"];
            }
            // var_dump($dataArr);die;
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr));
        } else {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }
}