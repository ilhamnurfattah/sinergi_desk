<?php


class Denied extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('layouts/header');
		$this->load->view('errors/denied');
		$this->load->view('layouts/footer');
	}
}
