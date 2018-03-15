<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class geofence extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/geofence');
		//$this->load->view('admin/dummy');
	}
}