<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Octo extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['active']		=	'home';
		$data['mainView'] 	= 	'index';
		$this->load->vars($data);
		$this->load->view(MASTERVIEW);
	}
	public function aboutus()
	{
		$data['active']		=	'aboutus';
		$data['mainView'] 	= 	'index';
		$this->load->vars($data);
		$this->load->view(MASTERVIEW);
	}
	public function ourservices()
	{
		$data['active']		=	'ourservices';
		$data['mainView'] 	= 	'index';
		$this->load->vars($data);
		$this->load->view(MASTERVIEW);
	}
	public function becomevendor()
	{
		$data['active']		=	'becomevendor';
		$data['mainView'] 	= 	'index';
		$this->load->vars($data);
		$this->load->view(MASTERVIEW);
	}
	public function contactus()
	{
		$data['active']		=	'contactus';
		$data['mainView'] 	= 	'index';
		$this->load->vars($data);
		$this->load->view(MASTERVIEW);
	}
}
