<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//fungsi untuk mendapatkan logo
function getLogo() {
	$ci = & get_instance();
	$ci->load->model('Model_settings','settings');

	$logo = $ci->settings->tampilLogo()->row_array();

    if($logo && file_exists("assets/img/logo/".$logo['file_name'])) {
        return base_url('assets/img/logo/'.$logo['file_name']);
    } else {
        return 'Sport Information';
    }
}