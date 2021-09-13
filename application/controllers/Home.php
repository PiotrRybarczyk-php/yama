<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if (!$this->db->table_exists('users')) {
			$this->base_m->create_base();
		}
		if (!isset($_SESSION['lang'])) {
			$_SESSION['lang'] = 'pl';
		}
	}

	public function change($lang)
	{
		$_SESSION['lang'] = $lang;
	}

	public function index()
	{
		$data = loadDefaultDataFront();
		$data['cp'] = "main";
		echo loadViewsFront('index', $data);
	}
}
