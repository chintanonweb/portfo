<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

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
		$this->load->view('/panel/adminpanel/front_manage/slider');
	}
	public function slideradd()
	{
		$sld = array('psd_title'=>$this->input->post('title'),
					'psd_flag'=>$this->input->post('flag'));
		$sld['psd_image'] = file_get_contents($_FILES['simage']['tmp_name']);

		$s = $this->db->insert('p_slider',$sld);
		
		if($s)
		{
			$this->pmodel->noerror_message('Slider Added Successfully');
			redirect('/admin/front_manage/slider','refresh');
		}
		else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/front_manage/slider','refresh');
		}
	}
	public function sliderupdate()
	{
		$slupdate = array('psd_title'=>$this->input->post('title'));

		if($_FILES['simage']['tmp_name'] != '')
		{
			$slupdate['psd_image'] = file_get_contents($_FILES['simage']['tmp_name']);
		}
		$this->db->where('psd_id',$this->input->post('id'));
		$sd = $this->db->update('p_slider',$slupdate);

		if($sd){
			$this->pmodel->noerror_message('Slider Updated Successfully');
			redirect('/admin/front_manage/slider','refresh');
		}else{
			$this->pmodel->error_message('Something Want To Wrong');
			redirect('/admin/front_manage/slider','refresh');
		}
	}
}
