<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
	public function registration()
	{
		$this->load->view('register');
    }
    public function rprocess()
    {
		$res = $this->db->select_max('pu_accno');
		$res = $this->db->get('p_user');
		$row = $res->row();
		if($res->num_rows() > 0)
		{
			$a =$row->pu_accno;
			$a++;
		}
		else{
			$a = '10001';
		}
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$role = $this->input->post('role');
		$array = array('pu_email' => $email,
       					 'pu_password' => $password,
						'pu_role' => $role,
						'pu_accno'=>$a);

		$q = $this->db->query("Select *from p_user where pu_email='".$this->input->post('email')."'");
		$row1 = $q->num_rows();
		if($row1)
		{
		$this->pmodel->error_message('This user is already exist');
		redirect('auth/registration','refresh');
		}
		else{
		$ans = $this->db->insert('p_user',$array);
		
		if($role == 'user')
		{
		$arr = array('pu_accno'=>$a,
					'pud_email'=>$email);
		$this->db->insert('p_user_detail',$arr);
		}
		if($role == 'merchant')
		{
			$res1 = $this->db->select_max('pcd_accno');
			$res1 = $this->db->get('p_company_detail');
			$row1 = $res1->row();
			if($res1->num_rows()>0)
			{
				$a1 = $row1->pcd_accno;
				$a1++;
			}
			else{
				$a1 = '11001';
			}
			$mr = array('pu_accno'=>$a,'pcd_accno'=>$a1,'pcd_email'=>$email);
			$this->db->insert('p_company_detail',$mr);
			$pr = array('pcd_accno'=>$a1);
			$this->db->insert('p_company_representative',$pr);

		}
		if($ans)
    	{
			$this->pmodel->noerror_message('Registration Successful');
			redirect('auth/login','refresh');	
   		}
    	else
    	{
		$this->pmodel->error_message('Registration Fail');
        redirect('auth/registration','refresh');	
		}
		}
	}
	public function login()
	{
		$this->load->view('/login');
	}
	public function lprocess()
	{
		$array1 = array('pu_email' => $this->input->post('email'),
		'pu_password' => $this->input->post('password'));
		
		$ans1 = $this->db->get_where('p_user',$array1);
		$row = $ans1->row();
		if($ans1->num_rows() == 1 && $row->pu_role == 'user')
		{
			$this->session->set_userdata('pu_accno',$row->pu_accno);
			redirect('/user/dashboard','refresh');
		}
		elseif($ans1->num_rows() == 1 && $row->pu_role == 'merchant')
		{
			$this->session->set_userdata('pu_accno',$row->pu_accno);
			redirect('/merchant/dashboard','refresh');
		}
		else if($ans1->num_rows() == 1 && $row->pu_role == 'admin')
		{		
			$this->session->set_userdata('pu_accno',$row->pu_accno);
			redirect('/admin/dashboard','refresh');
		}
		else{
			$this->pmodel->error_message('Login Fail');
			redirect('/auth/login','refresh');
		}

	}

	public function logout()
	{
		$this->session->unset_userdata('pu_accno');
		$this->pmodel->noerror_message('Logout Successful');
		redirect('/auth/login','refresh');
		die();
			
	}
}