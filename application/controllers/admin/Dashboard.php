<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->pmodel->isloggedin();
		$this->load->view('/panel/adminpanel/dashboard');
	}
	public function flagchangedata()
	{
		$id = $this->input->post('id');
		$table = $this->input->post('table');
		$column = $this->input->post('column');
		$flagcolumn = $this->input->post('flagcolumn');

		$f = $this->db->where($column,$id);
		$f = $this->db->get($table)->row()->$flagcolumn;

		if($f == 1)
		{
			$d = array($flagcolumn => 0);
			$f1 = $this->db->where($column,$id);
			$f1 = $this->db->update($table,$d);
			if($f1)
			{
				echo '1';
			}

		}
		else{
			$d = array($flagcolumn => 1);
			$f1 = $this->db->where($column,$id);
			$f1 = $this->db->update($table,$d);
			if($f1)
			{
				echo '1';
			}
		}
	}
	public function deletedata()
	{
		$q = $this->db->where($this->input->post('column'),$this->input->post('id'));
		$q = $this->db->delete($this->input->post('table'));
		if($q)
		{
			echo '1';
		}
		else{
			echo '0';
		}
	}
}
