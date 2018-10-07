<?php

function semester($kode=null){
	// param $kode=20162

	$semester = (intval(date("m")) >= 1 && intval(date("m")) <= 6) ? "Genap":"Ganjil";
	$tahun_akademik = (intval(date("m")) >= 1 && intval(date("m")) <= 6) ? intval(date("Y")-1)."/".intval(date("Y")) : intval(date("Y"))."/".intval(date("Y")+1) ;
	if(null != $kode){
		$semester = (substr($kode, -1) == 2) ? "Genap":"Ganjil";
		$tahun_akademik = (substr($kode, -1) == 2) ? intval(substr($kode, 0, 4)-1)."/".intval(substr($kode, 0, 4)) :  intval(substr($kode, 0, 4))."/".intval(substr($kode, 0, 4)+1) ;
	}

	return $semester." ".$tahun_akademik;
}

function bulan($bulan = null){
	$nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
	$bulan = (null != $bulan) ? $bulan : intval(date("m"));
	return $nama_bulan[$bulan-1];
}

function usia_surat($created_at){
	$date1 = date_create($created_at);
	$date2 = date_create(date("Y-m-d"));

	$usia_surat = date_diff($date1, $date2);

	return $usia_surat->format("%a");
}