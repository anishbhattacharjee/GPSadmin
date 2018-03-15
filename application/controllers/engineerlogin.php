<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class engineerlogin extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('admin/login');
		$aa=$this->uri->segment(3);
	$data['msg3']=urldecode($aa);
		$this->load->view('admin/engineerlogin',$data);
	}
	public function validate()
	{
		$this->load->model('adminmodel');

		  $query=$this->adminmodel->validate_engineer();

//$subquery=$this->adminmodel->validate_subadmin();

			if($query)



			{



			$username = $this->input->post('username');



			$this->session->set_userdata('engusername', $username);
 $un=$this->session->userdata('engusername'); 
//var_dump($un);



			redirect('engineerlogin/dashboard');



			}

			else
			{

			$data="Please Provide Correct Username And Password";

			 	redirect("engineerlogin/index/$data");
			}
	}
	function dashboard()
	{
		$this->load->view('admin/engdashboard');
	}
	
	public function logout()
	{
		$this->session->unset_userdata('engusername');	
		$this->index();	
	}
}