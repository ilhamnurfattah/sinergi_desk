<?php

function generate_kode(){
	$CI = get_instance();
	$karyawan = $CI->db->select('*')->from('karyawan')->order_by('nik','DESC')->get()->row_object();
	$last = $karyawan->nik;

	$urutan = (int) substr($last, 1, 4);

	$urutan++;
	$huruf = "K";
	$kodeBarang = $huruf . sprintf("%04s", $urutan);
	return $kodeBarang;
}

function dev_id(){
	$CI = get_instance();
	$karyawan = $CI->db->select('*')->from('developer')->order_by('id_dev','DESC')->get()->row_object();
	$last = $karyawan->id_dev;

	$urutan = (int) substr($last, 1, 4);
	// echo "$kodeBarang";
	$urutan++;
	$huruf = "D";
	$kodeBarang = $huruf . sprintf("%04s", $urutan);
	return $kodeBarang;
}

function ticket_id(){
	$CI = get_instance();
	$karyawan = $CI->db->select('*')->from('ticket')->order_by('id_ticket','DESC')->get()->row_object();
	$last = $karyawan->id_ticket;

	$urutan = (int) substr($last, 9, 4);

	$urutan++;
	$huruf = "T".date('Ymd');
	$kodeBarang = $huruf . sprintf("%04s", $urutan);
	return $kodeBarang;
}

function isLogin(){
	$CI = get_instance();
	if (!$CI->session->userdata('status')){
		return redirect(site_url('login'));
	}
}

function guard($guard){
	$CI = get_instance();
	$guard  = explode('|', $guard);
	$level = $CI->session->userdata('level');
	if (!in_array($level, $guard)){
		return redirect(site_url('denied'));
	}
}

function status($status){

	switch ($status) {
		case "Open":
			return "<span class='badge bg-red'>$status</span>";
			break;
		case "Re-Open":
			return "<span class='badge bg-orange'>$status</span>";
			break;
		case "Fixed":
			return "<span class='badge bg-yellow'>$status</span>";
			break;
		case "Close":
			return "<span class='badge bg-green'>$status</span>";
			break;
		case "Need Confirmation":
			return "<span class='badge bg-blue'>$status</span>";
			break;
//		default:
//			echo "Your favorite color is neither red, blue, nor green!";
	}
}

function badge_assignemen($nik = null){
	$CI = get_instance();
	$CI->load->model('ticket_model');
	if ($nik == null){
		$ass = $CI->ticket_model->get_assignements();
	}else{
		$ass = $CI->ticket_model->my_assignements($nik);
	}

	if (count($ass) > 0){
		return "<span class='badge badge-info right'>".count($ass)."</span>";
	}
}

function bagde_aproval(){
	$CI = get_instance();
	$CI->load->model('ticket_model');
	$ass = $CI->ticket_model->get_aproval();
	if (count($ass) > 0){
		return "<span class='badge badge-info right'>".count($ass)."</span>";
	}
}
