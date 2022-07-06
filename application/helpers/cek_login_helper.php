<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// cek apakah login atau tidak
function cek_login() {
	$ci = & get_instance();
	$login = $ci->session->userdata('COSTUME');
	if(($login['login']??'') != 'yes') {
		return 'noLogin';
	} else {
		return 'yesLogin';
	}
}

// cek apakah login benar, maka pergi admin dashboard
function cek_login_for_page_login() {
	$ci = & get_instance();
	$login = $ci->session->userdata('COSTUME');
	if(($login['login']??'') === 'yes') {
		redirect('adminDashboard');
	}
}