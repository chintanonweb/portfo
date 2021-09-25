<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

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
		$this->load->view('/panel/userpanel/portfolio/gallery');
	}
	public function addgallery()
	{
		$addg = array('pu_accno'=>$this->session->userdata('pu_accno'),
					'pug_title'=>$this->input->post('gtitle'),
					'pug_desc'=>$this->input->post('gdesc'),
					'pug_flag'=>$this->input->post('flag')); 
			
		if ($_FILES['gimage']['tmp_name'] != '') {
			$addg['pug_img'] = file_get_contents($_FILES['gimage']['tmp_name']);
		}
		$ag = $this->db->insert('pu_gallery',$addg);
		if($ag)
		{
			$this->pmodel->noerror_message('Gallery Added Successfully');
			redirect('/user/portfolio/gallery','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/gallery','refresh');
		}
	}
	public function editgallery()
	{
		$editg = array('pug_title'=>$this->input->post('gtitle'),
		'pug_desc'=>$this->input->post('gdesc'));
		
		if ($_FILES['gimage']['tmp_name'] != '') {
			$addg['pug_img'] = file_get_contents($_FILES['gimage']['tmp_name']);
		}
		$this->db->where('pug_id',$this->input->post('id'));
		$ug = $this->db->update('pu_gallery',$editg);

		if($ug){
			$this->pmodel->noerror_message('Gallery Updated Successfully');
			redirect('/user/portfolio/gallery','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/user/portfolio/gallery','refresh');
		}
	}
}