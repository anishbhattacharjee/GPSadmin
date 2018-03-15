<?php
class adminmodel extends CI_Model



{

public function __construct()

{

		   parent::__construct();



}



public function validate_admin()

{

				$query=$this->db->where('email_id',$this->input->post('username'));

				$query=$this->db->where('password',$this->input->post('password'));

				//$query=$this->db->where('user_type','admin');

				$query=$this->db->get('admin_data');

				if($query->num_rows() == 1)

				{

					return true;

				}

}

public function validate_engineer()

{

				$query=$this->db->where('engineers_email',$this->input->post('username'));

				$query=$this->db->where('engineers_uniqid',$this->input->post('password'));

				$query=$this->db->where('designation','Helpdesk');

				$query=$this->db->get('engineers');

				if($query->num_rows() == 1)

				{

					return true;

				}

}

}