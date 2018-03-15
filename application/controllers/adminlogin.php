<?php include 'dbcon.php'; ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class adminlogin extends CI_Controller {

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
        global $con;
		//$this->load->view('admin/login');
		$aa=$this->uri->segment(3);
		$data['msg3']=urldecode($aa);
		$this->load->view('admin/adminlogin',$data);
	}
	public function validate()
	{
        global $con;
		$this->load->model('adminmodel');

		  $query=$this->adminmodel->validate_admin();

//$subquery=$this->adminmodel->validate_subadmin();

			if($query)



			{



			$username = $this->input->post('username');



			$this->session->set_userdata('username', $username);


			if($username=='markelectronics'){
				redirect('concox');
			}else{
				redirect('adminlogin/dashboard');
			}
			



			}

			else
			{

			$data="Please Provide Correct Username And Password";

			 	redirect("adminlogin/index/$data");
			}
	}
	function dashboard()
	{
        global $con;
		$this->load->view('admin/dashboard');
	}
	
	public function logout()
	{
        global $con;
		$this->session->unset_userdata('username');	
		$this->index();	
	}
}