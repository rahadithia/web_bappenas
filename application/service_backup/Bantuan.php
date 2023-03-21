<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

require APPPATH . '/libraries/REST_Controller.php';

class Bantuan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function count_data_post()
    {
        $data['jum_bpnt']       = $this->_count_bpnt();
        $data['jum_pkh']        = $this->_count_pkh();
        $data['jum_jkn']        = $this->_count_jkn();
        $data['jum_bpum']       = $this->_count_bpum();
        $data['jum_rtlh']       = $this->_count_rtlh();
        $data['jum_tangcer']    = $this->_count_tangcer();
        $data['jum_isoman']     = $this->_count_isoman();

        $this->response(array("success" => true, "data" => $data), REST_Controller::HTTP_OK);
    }
    
    private function _count_bpnt()
    {
        $q_bpnt         = $this->_q_bpnt();
        $q_bpnt         = $this->_filter_wilayah_bpnt($q_bpnt);
        $json_bpnt      = json_encode($q_bpnt, JSON_UNESCAPED_SLASHES);
        $jumlah_bpnt    = $this->elasticsearch->count('satudata*', $json_bpnt);
        return $jumlah_bpnt['count'];
    }
    
    private function _q_bpnt()
    {
        $q_bpnt = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_bansosbpnt',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_bpnt[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_bpnt;
    }
    
    private function _filter_wilayah_bpnt($q_bpnt)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_bpnt['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_bpnt['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_bpnt['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_bpnt['query']['bool']['filter'], $rt);
        }

        return $q_bpnt;
    }
    
    private function _count_pkh()
    {
        $q_pkh         = $this->_q_pkh();
        $q_pkh         = $this->_filter_wilayah_pkh($q_pkh);
        $json_pkh      = json_encode($q_pkh, JSON_UNESCAPED_SLASHES);
        $jumlah_pkh    = $this->elasticsearch->count('satudata*', $json_pkh);
        return $jumlah_pkh['count'];
    }
    
    private function _q_pkh()
    {
        $q_pkh = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_bansospkh',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_pkh[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_pkh;
    }
    
    private function _filter_wilayah_pkh($q_pkh)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_pkh['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_pkh['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_pkh['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_pkh['query']['bool']['filter'], $rt);
        }

        return $q_pkh;
    }
    
    private function _count_jkn()
    {
        $q_jkn         = $this->_q_jkn();
        $q_jkn         = $this->_filter_wilayah_jkn($q_jkn);
        $json_jkn      = json_encode($q_jkn, JSON_UNESCAPED_SLASHES);
        $jumlah_jkn    = $this->elasticsearch->count('satudata*', $json_jkn);
        return $jumlah_jkn['count'];
    }
    
    private function _q_jkn()
    {
        $q_jkn = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_pbijkn',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_jkn[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_jkn;
    }
    
    private function _filter_wilayah_jkn($q_jkn)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_jkn['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_jkn['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_jkn['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_jkn['query']['bool']['filter'], $rt);
        }

        return $q_jkn;
    }
    
    private function _count_bpum()
    {
        $q_bpum         = $this->_q_bpum();
        $q_bpum         = $this->_filter_wilayah_bpum($q_bpum);
        $json_bpum      = json_encode($q_bpum, JSON_UNESCAPED_SLASHES);
        $jumlah_bpum    = $this->elasticsearch->count('satudata*', $json_bpum);
        return $jumlah_bpum['count'];
    }
    
    private function _q_bpum()
    {
        $q_bpum = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_bpum',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_bpum[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_bpum;
    }
    
    private function _filter_wilayah_bpum($q_bpum)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_bpum['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_bpum['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_bpum['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_bpum['query']['bool']['filter'], $rt);
        }

        return $q_bpum;
    }
    
    private function _count_rtlh()
    {
        $q_rtlh         = $this->_q_rtlh();
        $q_rtlh         = $this->_filter_wilayah_rtlh($q_rtlh);
        $json_rtlh      = json_encode($q_rtlh, JSON_UNESCAPED_SLASHES);
        $jumlah_rtlh    = $this->elasticsearch->count('satudata*', $json_rtlh);
        return $jumlah_rtlh['count'];
    }
    
    private function _q_rtlh()
    {
        $q_rtlh = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_rtlh',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_rtlh[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_rtlh;
    }
    
    private function _filter_wilayah_rtlh($q_rtlh)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_rtlh['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_rtlh['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_rtlh['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_rtlh['query']['bool']['filter'], $rt);
        }

        return $q_rtlh;
    }
    
    private function _count_tangcer()
    {
        $q_tangcer         = $this->_q_tangcer();
        $q_tangcer         = $this->_filter_wilayah_tangcer($q_tangcer);
        $json_tangcer      = json_encode($q_tangcer, JSON_UNESCAPED_SLASHES);
        $jumlah_tangcer    = $this->elasticsearch->count('satudata*', $json_tangcer);
        return $jumlah_tangcer['count'];
    }
    
    private function _q_tangcer()
    {
        $q_tangcer = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_tangerangcerdas',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_tangcer[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_tangcer;
    }
    
    private function _filter_wilayah_tangcer($q_tangcer)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_tangcer['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_tangcer['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_tangcer['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_tangcer['query']['bool']['filter'], $rt);
        }

        return $q_tangcer;
    }
    
    private function _count_isoman()
    {
        $q_isoman         = $this->_q_isoman();
        $q_isoman         = $this->_filter_wilayah_isoman($q_isoman);
        $json_isoman      = json_encode($q_isoman, JSON_UNESCAPED_SLASHES);
        $jumlah_isoman    = $this->elasticsearch->count('satudata*', $json_isoman);
        return $jumlah_isoman['count'];
    }
    
    private function _q_isoman()
    {
        $q_isoman = array(
            'query' => array(
                'bool' =>
                array(
                    'must' =>
                    array(
                        array(
                            'exists' => array(
                                'field' => 'nama_kec.keyword',
                            ),
                        ),
                    ),
                    'filter' =>
                    array(

                    ),
                ),
            ),
        );
        
        $subkat_bool = array(
            'bool' =>
            array(
                'should' =>
                array(

                ),
            ),
        );
        
        $subkat = array(
            'exists' =>
            array(
                'field' => 'uraian_bantuanisoman',
            ),
        );

        array_push( $subkat_bool[ 'bool' ][ 'should' ], $subkat );
        array_push( $q_isoman[ 'query' ][ 'bool' ][ 'filter' ], $subkat_bool );
        
        return $q_isoman;
    }
    
    private function _filter_wilayah_isoman($q_isoman)
    {
        if ($this->input->post('no_kec')) 
        {
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
            array_push($q_isoman['query']['bool']['filter'], $kec);

            if ($this->input->post('no_kel'))
            {
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
                array_push($q_isoman['query']['bool']['filter'], $kel);
            }
        }

        if ($this->input->post('no_rw')) 
        {
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
            array_push($q_isoman['query']['bool']['filter'], $rw);
        }

        if ($this->input->post('no_rt'))
        {
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
            array_push($q_isoman['query']['bool']['filter'], $rt);
        }

        return $q_isoman;
    }
    
    public function list_post()
    {
        $from       = $this->input->post('from');
        $size       = $this->input->post('size');
        $dataArr    = array();

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
        
        if ($this->input->post('no_kec')) 
        {
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

            if ($this->input->post('no_kel')) 
            {
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

        if ($this->input->post('no_rw')) 
        {
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

        if ($this->input->post('no_rt')) 
        {
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

        if ($this->input->post('subkategori')) 
        {
            $subkategori = $this->input->post('subkategori');

            // echo json_encode($subkategori); die();
            $subkat_bool = array(
                'bool' =>
                array(
                    'should' =>
                    array(

                    ),
                ),
            );

            if ($subkategori == 'bpnt') 
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_bansosbpnt',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }
            elseif ($subkategori == 'pkh')
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_bansospkh',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }
            elseif ($subkategori == 'jkn')
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_pbijkn',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }
            elseif ($subkategori == 'bpum') 
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_bpum',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }
            elseif ($subkategori == 'rtlh') 
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_rtlh',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }
            elseif ($subkategori == 'tangcer') 
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_tangerangcerdas',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }
            elseif ($subkategori == 'isoman') 
            {
                $subkat = array (
                            'exists' => 
                            array (
                              'field' => 'uraian_bantuanisoman',
                            ),
                          );

                array_push($subkat_bool['bool']['should'], $subkat);
            }

            array_push($q_list_pengguna['query']['bool']['filter'], $subkat_bool);
        }

        if ($this->input->post('search')) 
        {
            $search_val = $this->input->post('search');
            
            if (is_numeric($search_val)) 
            {
                $search =array (
                          'query_string' => 
                          array (
                            'fields' => 
                            array ('nik','no_kk'),
                            'query' => $search_val,
                          ),
                        );
            }
            else
            {
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

        if ($this->input->post('sort')) 
        {
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
        }
        else
        {
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

        if (isset($data['hits']['hits'][0])) 
        {
            foreach($data['hits']['hits'] as $key=>$row)
            {
                $bpum = $this->detail_bpum($row["_source"]['nik']);
                
                if($bpum != null)
                {
                    $row["_source"]['jumlah_dana'] = $bpum['jumlah_dana'];   
                    $row["_source"]['bidang_usah'] = $bpum['bidang_usaha'];   
                    $row["_source"]['tahap']       = $bpum['tahap'];   
                    $row["_source"]['tahun']       = date('Y',strtotime($bpum['tahap']));   
                }
                else
                {
                    $row["_source"]['jumlah_dana'] = '-';   
                    $row["_source"]['bidang_usah'] = '-'; 
                    $row["_source"]['tahap']       = '-';  
                    $row["_source"]['tahun']       = '-';       
                }
                
                $dataArr[] = $row["_source"];
            }
            
            $data_pengguna = json_encode(array("success" => true, "data" => $dataArr, 'count_all' => $count_all['count'], 'count_filtered' => $count_filtered['count']));
        } 
        else
        {
            $data_pengguna = json_encode(array("success" => false, "message" => "Record not Found!"));
        }
        echo $data_pengguna;
    }

    public function detail_bpum($nik)
    {
        $list_bpum = json_encode(
            array(
                'size' => 1,
                'query' => array(
                    'bool' =>
                    array(
                        'must' =>
                        array(
                            array(
                                'term' =>
                                array(
                                    'nik.keyword' =>
                                    array(
                                        'value' => $nik,
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
                'sort' => array(
                    array(
                        'id' =>
                        array(
                            'order' => 'asc',
                        ),
                    ),
                ),
            )
        );
        $data = $this->elasticsearch->advancedquery('t_profil_bpum*', $list_bpum);

        if (isset($data['hits']['hits'][0])) 
        {
            return $data['hits']['hits'][0]['_source'];
        }
        else
        {
            return null;
        }
    }
}