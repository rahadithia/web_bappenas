<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

function date_indonesia($format = 'd F, Y',$timestamp = NULL)
{
    $l = array('', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu');
    $F = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');

    $return = '';
    if(is_null($timestamp)) { $timestamp = mktime(); }
    for($i = 0, $len = strlen($format); $i < $len; $i++) {
        switch($format[$i]) {
            case '\\' :
                $i++;
                $return .= isset($format[$i]) ? $format[$i] : '';
                break;
            case 'l' :
                $return .= $l[date('N', $timestamp)];
                break;
            case 'F' :
                $return .= $F[date('n', $timestamp)];
                break;
            default :
                $return .= date($format[$i], $timestamp);
                break;
        }
    }
    return $return;
}

function tanggal_indo($tanggal, $cetak_hari = false,$singkat_hari = false, $singkat_bulan = false,$cetak_waktu=false){
    if (!$tanggal) {
        return '';
    }
    $t = date('Y-m-d H:i:s', strtotime($tanggal));
    $s = explode(' ',$t);
    $tanggal = date('Y-m-d', strtotime($s[0]));

    if ($singkat_hari) {
        $hari = array ( 1 => 'Sen','Sel','Rab','Kam','Jum','Sab','Min');
    }else{
        $hari = array ( 1 => 'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
    }
    
    if ($singkat_bulan) {
        $bulan = array (1 => 'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des');
    }else{
        $bulan = array (1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
    }
            
    $split    = explode('-', $tanggal);
    if (isset($s[1]) && $cetak_waktu) {
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0].' '.$s[1];
    }else{
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
    
    
    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
    }

    return $tgl_indo;
}

function get_nama_bulan2($tahun_bulan,$singkat=false)
{
    $split = explode('-', $tahun_bulan);
    $month = $split[1];
    if (strlen($month) < 2 && $month < 10) {
        $month = "0".$month."";
    }else{
        $month = $month;
    }

    if ($singkat) {
       $bulan = array('01' =>'Jan', '02' =>'Feb', '03' =>'Mar', '04' =>'Apr', '05' =>'Mei', '06' =>'Jun', '07' =>'Jul', '08' =>'Agt', '09' =>'Sep', '10' =>'Okt', '11' =>'Nov', '12' =>'Des');
    }else{
        $bulan = array('01' =>'Januari', '02' =>'Februari', '03' =>'Maret', '04' =>'April', '05' =>'Mei', '06' =>'Juni', '07' =>'Juli', '08' =>'Agustus', '09' =>'September', '10' =>'Oktober', '11' =>'November', '12' =>'Desember');
    }

    return $bulan[''.$month.''].' '.$split[0];
}

function get_nama_bulan($month,$singkat=false)
{

    if (strlen($month) < 2 && $month < 10) {
        $month = "0".$month."";
    }else{
        $month = $month;
    }

    if ($singkat) {
       $bulan = array('01' =>'Jan', '02' =>'Feb', '03' =>'Mar', '04' =>'Apr', '05' =>'Mei', '06' =>'Jun', '07' =>'Jul', '08' =>'Agt', '09' =>'Sep', '10' =>'Okt', '11' =>'Nov', '12' =>'Des');
    }else{
        $bulan = array('01' =>'Januari', '02' =>'Februari', '03' =>'Maret', '04' =>'April', '05' =>'Mei', '06' =>'Juni', '07' =>'Juli', '08' =>'Agustus', '09' =>'September', '10' =>'Oktober', '11' =>'November', '12' =>'Desember');
    }
    

    return $bulan[''.$month.''];
}

function get_nama_hari($tanggal){

    $hari = date('D', strtotime($tanggal));
 
    switch($hari){
        case 'Sun':
            $nama_hari = "Minggu";
        break;
 
        case 'Mon':         
            $nama_hari = "Senin";
        break;
 
        case 'Tue':
            $nama_hari = "Selasa";
        break;
 
        case 'Wed':
            $nama_hari = "Rabu";
        break;
 
        case 'Thu':
            $nama_hari = "Kamis";
        break;
 
        case 'Fri':
            $nama_hari = "Jumat";
        break;
 
        case 'Sat':
            $nama_hari = "Sabtu";
        break;
        
        default:
            $nama_hari = "Tidak di ketahui";     
        break;
    }

    return $nama_hari;
}

?>